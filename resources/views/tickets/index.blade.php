
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Tiket - Tadah Uwuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-emerald-50 p-6">

    <main class="max-w-5xl mx-auto">
        <a href="{{ route('home') }}"
            class="text-emerald-700">
            ← Kembali ke dashboard
        </a>

        <h1 class="text-3xl font-bold text-emerald-900 mt-6">
            Riwayat Pemesanan
        </h1>

        <p class="text-gray-600 mt-2 mb-6">
            Daftar pemesanan tiket wisata Tadah Uwuk.
        </p>

        @forelse ($tickets as $ticket)
            <div class="bg-white rounded-xl shadow-sm p-6 mb-4">
                <div class="flex flex-wrap justify-between gap-3">
                    <div>
                        <h2 class="font-bold text-lg">
                            {{ $ticket->kode_tiket }}
                        </h2>
                        <p class="text-gray-600 mt-1">
                            Nama pengunjung:
                            {{ $ticket->nama_pengunjung }}
                        </p>

                        <p class="text-gray-600 mt-1">
                            Tanggal kunjungan:
                            {{ $ticket->tanggal_kunjungan->format('d-m-Y') }}
                        </p>
                        
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Status pembayaran
                        </p>

                        <span class="inline-block mt-1 px-3 py-1 rounded-full text-sm bg-amber-100 text-amber-800">
                            {{ ucfirst($ticket->status_pembayaran) }}
                        </span>

                        <p class="text-sm text-gray-500 mt-3">
                            Status kunjungan:
                            {{ str_replace('_', ' ', ucfirst($ticket->status_kunjungan)) }}
                        </p>

                        <a href="{{ route('tickets.show', $ticket->id) }}"
                            class="inline-block mt-3 bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                            Lihat Detail
                        </a>    
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl p-8 text-center">
                <h2 class="text-xl font-semibold">
                    Belum ada pemesanan
                </h2>

                <p class="text-gray-600 mt-2">
                    Pesanan tiket kamu akan muncul di sini.
                </p>

                <a href="{{ route('tickets.create') }}"
                    class="inline-block mt-5 bg-emerald-700 text-white px-5 py-3 rounded-lg">
                    Pesan Tiket
                </a>

                
            </div>
        @endforelse
    </main>

</body>
</html>
