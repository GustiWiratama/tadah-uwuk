<?php

namespace App\Http\Controllers;


use App\Mail\VerifyRegistrationMail;
use App\Models\PendingRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[^@\s]+@gmail\.com$/i',
                'unique:users,email',
            ],
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.regex' => 'Gunakan alamat Gmail yang berakhiran @gmail.com.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan login.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $email = strtolower($validated['email']);

        // Buat token verifikasi acak.
        $token = Str::random(64);

        // Perbarui pendaftaran sementara jika email pernah mendaftar
        // tetapi belum menyelesaikan verifikasi.
        $pending = PendingRegistration::updateOrCreate(
            ['email' => $email],
            [
                'name' => $validated['name'],
                'password' => Hash::make($validated['password']),
                'token_hash' => hash('sha256', $token),
                'expires_at' => now()->addMinutes(30),
            ]
        );

        $verificationUrl = route('register.verify', [
            'id' => $pending->id,
            'token' => $token,
        ]);

        try {
            Mail::to($email)->send(
                new VerifyRegistrationMail($verificationUrl)
            );
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->withErrors([
                    'email' => 'Email verifikasi gagal dikirim. Periksa konfigurasi email lalu coba lagi.',
                ]);
        }

        return redirect()
            ->route('login')
            ->with('success', 'Tautan verifikasi telah dikirim ke Gmail kamu. Periksa kotak masuk atau folder spam.');
    }

    public function verify(Request $request, int $id, string $token)
    {
        $pending = PendingRegistration::find($id);

        if (
            !$pending ||
            $pending->expires_at->isPast() ||
            !hash_equals(
                $pending->token_hash,
                hash('sha256', $token)
            )
        ) {
            return redirect()
                ->route('register')
                ->withErrors([
                    'email' => 'Tautan verifikasi tidak valid atau sudah kedaluwarsa. Silakan daftar kembali.',
                ]);
        }

        if (User::where('email', $pending->email)->exists()) {
            $pending->delete();

            return redirect()
                ->route('login')
                ->with('success', 'Email sudah terdaftar. Silakan login.');
        }

        $user = new User();
        $user->name = $pending->name;
        $user->email = $pending->email;
        $user->password = $pending->password;
        $user->email_verified_at = now();
        $user->role = 'wisatawan';
        $user->save();

        $pending->delete();

        return redirect()
            ->route('login')
            ->with('success', 'Email berhasil diverifikasi dan akun berhasil dibuat. Silakan login.');
    }
}
