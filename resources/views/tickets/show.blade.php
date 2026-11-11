<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket - Tadah Uwuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="max-w-2xl mx-auto px-6 py-10">

        <a href="{{ route('tickets.index') }}"
           class="text-green-700 hover:underline">
            ← Kembali ke Riwayat Tiket
        </a>

        <div class="bg-white rounded-2xl shadow-sm p-6 mt-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Detail Tiket
            </h1>

            <p class="text-gray-500 mt-1">
                Informasi pesanan tiket wisata Tadah Uwuk
            </p>

            <div class="border-t border-b border-gray-200 my-6 py-5 space-y-4">

                <div>
                    <p class="text-sm text-gray-500">Kode Tiket</p>
                    <p class="font-bold text-green-700">
                        {{ $ticket->kode_tiket }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Nama Pemesan</p>
                    <p class="font-medium">
                        {{ auth()->user()->name }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Tanggal Kunjungan</p>
                    <p class="font-medium">
                        {{ $ticket->tanggal_kunjungan->format('d-m-Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Jumlah Pengunjung</p>
                    <p class="font-medium">
                        {{ $ticket->jumlah_pengunjung }} orang
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Total Harga</p>
                    <p class="font-medium">
                        Rp{{ number_format($ticket->total_harga, 0, ',', '.') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Status Pembayaran</p>
                    <p class="font-medium">
                        {{ ucfirst($ticket->status_pembayaran) }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Status Kunjungan</p>
                    <p class="font-medium">
                        {{ ucfirst(str_replace('_', ' ', $ticket->status_kunjungan)) }}
                    </p>
                </div>

            </div>

            @if ($ticket->status_pembayaran !== 'lunas')
                <div class="bg-amber-50 text-amber-800 p-4 rounded-xl">
                    Tiket belum dapat digunakan karena pembayaran belum dikonfirmasi.
                </div>
            @else
                <div class="bg-green-50 text-green-800 p-4 rounded-xl">
                    Pembayaran telah dikonfirmasi. Silakan tunjukkan tiket kepada petugas.
                </div>
            @endif

        </div>
    </div>

</body>
</html>