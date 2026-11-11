
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket - Tadah Uwuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-emerald-50 p-6">

    <main class="max-w-xl mx-auto bg-white rounded-2xl shadow-sm p-8">
        <a href="{{ route('home') }}"
            class="text-emerald-700">
            ← Kembali ke dashboard
        </a>

        <h1 class="text-3xl font-bold text-emerald-900 mt-6">
            Pesan Tiket Wisata
        </h1>

        <p class="text-gray-600 mt-2 mb-6">
            Isi data kunjungan ke Tadah Uwuk.
        </p>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded-lg mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div>
            <label for="nama_pengunjung"
                class="mb-2 block font-semibold text-gray-700">
                Nama Pengunjung
            </label>

            <input
                type="text"
                id="nama_pengunjung"
                name="nama_pengunjung"
                value="{{ old('nama_pengunjung') }}"
                required
                maxlength="255"
                placeholder="Masukkan nama lengkap pengunjung"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-emerald-700 focus:outline-none"
            >

            @error('nama_pengunjung')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <label class="block font-medium mb-2">
                Tanggal kunjungan
            </label>
            <input type="date"
                name="tanggal_kunjungan"
                min="{{ date('Y-m-d') }}"
                value="{{ old('tanggal_kunjungan') }}"
                required
                class="w-full border rounded-lg p-3 mb-5">

            


            <button type="submit"
                class="w-full bg-emerald-700 text-white p-3 rounded-lg hover:bg-emerald-800">
                Buat Pesanan
            </button>
        </form>
    </main>

</body>
</html>
