
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Tadah Uwuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-emerald-50 flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <a href="{{ route('home') }}"
           class="text-sm text-emerald-700">
            ← Kembali ke beranda
        </a>

        <h1 class="text-3xl font-bold text-emerald-900 mt-6">
            Buat Akun
        </h1>

        <p class="text-gray-500 mt-2 mb-6">
            Daftar untuk mulai memesan tiket wisata.
        </p>

        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-3 rounded-lg mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label class="block mb-2 font-medium">Nama lengkap</label>
            <input type="text" name="name"
                value="{{ old('name') }}"
                required
                class="w-full border rounded-lg p-3 mb-4">

            <label class="block mb-2 font-medium">Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}"
                required
                class="w-full border rounded-lg p-3 mb-4">

            <label class="block mb-2 font-medium">Password</label>
            <input type="password" name="password"
                required
                class="w-full border rounded-lg p-3 mb-4">

            <label class="block mb-2 font-medium">Konfirmasi password</label>
            <input type="password" name="password_confirmation"
                required
                class="w-full border rounded-lg p-3 mb-6">

            <button type="submit"
                class="w-full bg-emerald-700 text-white p-3 rounded-lg hover:bg-emerald-800">
                Daftar
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}"
                class="text-emerald-700 font-semibold">
                Login
            </a>
        </p>
    </div>

</body>
</html>
