<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function show($id)
{
    $ticket = Ticket::where('user_id', auth()->id())
        ->findOrFail($id);

    return view('tickets.show', compact('ticket'));
}
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'nama_pengunjung' => $validated['nama_pengunjung'],
            'kode_tiket' => strtoupper(\Illuminate\Support\Str::random(10)),
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'jumlah_pengunjung' => 1,
            'total_harga' => 10000,
            'status_pembayaran' => 'menunggu',
            'status_kunjungan' => 'belum_dikunjungi',
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Pemesanan tiket berhasil dibuat.');
    }

}
