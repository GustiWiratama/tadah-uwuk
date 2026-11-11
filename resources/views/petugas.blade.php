
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - Tadah Uwuk</title>
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
        <h2 class="text-3xl font-bold text-emerald-900">
            Dashboard Petugas Loket
        </h2>

        <p class="text-gray-600 mt-2">
            Halo, {{ auth()->user()->name }}. Selamat bertugas!
        </p>

        <div class="grid md:grid-cols-2 gap-5 mt-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold">
                    Pemeriksaan Tiket
                </h3>
                <p class="text-gray-600 mt-2">
                    Periksa status tiket sebelum pengunjung memasuki kawasan wisata.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold">
                    Pemindaian QR Tiket
                </h3>
                <p class="text-gray-600 mt-2">
                    Fitur pemindaian QR akan digunakan untuk mencatat kedatangan pengunjung.
                </p>
            </div>
        </div>
    </main>

</body>
</html>
