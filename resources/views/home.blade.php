
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wisatawan - Tadah Uwuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-emerald-50">

    <nav class="bg-emerald-800 text-white px-6 py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Tadah Uwuk</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-white text-emerald-800 px-4 py-2 rounded-lg">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        <div class="bg-white rounded-2xl p-8 shadow-sm">
            <p class="text-emerald-700 font-medium">
                Dashboard Wisatawan
            </p>

            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                Halo, {{ auth()->user()->name }}!
            </h2>

            <p class="text-gray-600 mt-3">
                Selamat datang di sistem informasi wisata Tadah Uwuk.
            </p>

            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800">
                    Menu Wisatawan
                </h3>

                <p class="text-gray-600 mt-2">
                    Informasi wisata dan pemesanan tiket akan tersedia di sini.
                </p>
            </div>

            <a href="{{ route('home') }}"
                class="inline-block mt-6 bg-emerald-700 text-white px-5 py-3 rounded-lg">
                Kembali ke Beranda
            </a>

            
            <a href="{{ route('tickets.create') }}"
                class="inline-block bg-emerald-700 text-white px-5 py-3 rounded-lg mt-4">
                Pesan Tiket
            </a>

            <a href="{{ route('tickets.index') }}"
                class="inline-block border border-emerald-700 text-emerald-700 px-5 py-3 rounded-lg mt-4">
                Riwayat Tiket
            </a>

        </div>
    </main>

</body>
</html>
