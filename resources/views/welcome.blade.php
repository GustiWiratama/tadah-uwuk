
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tadah Uwuk | Wisata Bali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .hero {
            background:
                linear-gradient(90deg, rgba(15, 35, 25, .85), rgba(15, 35, 25, .2)),
                url('https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=2000&q=85');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="#beranda" class="text-2xl font-bold tracking-wide text-emerald-800">
                Tadah Uwuk<span class="text-amber-500">.</span>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                <a href="#beranda" class="hover:text-emerald-700">Beranda</a>
                <a href="#tentang" class="hover:text-emerald-700">Tentang</a>
                <a href="#kunjungan" class="hover:text-emerald-700">Kunjungan</a>
                <a href="#kontak" class="hover:text-emerald-700">Kontak</a>
            </div>

            
            @auth
                <div class="flex items-center gap-3">
                    <a href="{{ route('tickets.create') }}"
                    class="rounded-full bg-emerald-800 px-5 py-2.5 font-semibold text-white transition hover:bg-emerald-900">
                        Pesan Tiket
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full border border-emerald-800 px-5 py-2.5 font-semibold text-emerald-800 transition hover:bg-emerald-50">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                class="rounded-full bg-emerald-800 px-5 py-2.5 font-semibold text-white transition hover:bg-emerald-900">
                    Login
                </a>
            @endauth

        </nav>
    </header>

    <!-- HERO -->
    <section id="beranda" class="hero flex min-h-[580px] items-center text-white md:min-h-[660px]">
        <div class="mx-auto w-full max-w-7xl px-6 py-20">
            <p class="mb-5 font-semibold uppercase tracking-[0.25em] text-amber-300">
                Jelajahi Keindahan Bali
            </p>

            <h1 class="max-w-3xl text-4xl font-bold leading-tight md:text-6xl">
                Temukan Ketenangan dalam Keindahan Alam
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-relaxed text-stone-200">
                Kenali Tadah Uwuk, temukan informasi kunjungan, dan
                rencanakan perjalananmu dengan lebih mudah.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <a href="#tentang"
                    class="rounded-full bg-amber-400 px-7 py-3 font-bold text-stone-900 transition hover:bg-amber-300">
                    Jelajahi Wisata
                </a>

                <a href="#pesan"
                    class="rounded-full border border-white px-7 py-3 font-semibold transition hover:bg-white hover:text-emerald-900">
                    Pesan Tiket →
                </a>
            </div>
        </div>
    </section>

    <!-- INFORMASI SINGKAT -->
    <section class="relative z-10 mx-auto -mt-10 max-w-6xl px-6">
        <div class="grid gap-4 rounded-2xl bg-white p-6 shadow-lg md:grid-cols-3">
            <div class="flex items-center gap-4 p-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-2xl">
                    🌿
                </div>
                <div>
                    <h3 class="font-bold">Wisata Alam</h3>
                    <p class="text-sm text-stone-500">Kenali destinasi Tadah Uwuk</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl">
                    🎟️
                </div>
                <div>
                    <h3 class="font-bold">Pemesanan Online</h3>
                    <p class="text-sm text-stone-500">Rencanakan kunjunganmu</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100 text-2xl">
                    📊
                </div>
                <div>
                    <h3 class="font-bold">Informasi Kunjungan</h3>
                    <p class="text-sm text-stone-500">Lihat ringkasan kunjungan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-24 md:grid-cols-2">
        <div>
            <p class="font-bold uppercase tracking-widest text-emerald-700">
                Tentang Tadah Uwuk
            </p>

            <h2 class="mt-4 text-3xl font-bold leading-tight md:text-4xl">
                Pengalaman Wisata yang Lebih Terencana
            </h2>

            <p class="mt-6 leading-relaxed text-stone-600">
                Tadah Uwuk merupakan destinasi wisata yang berada di
                Kabupaten Klungkung, Bali. Melalui website ini, pengunjung
                dapat mengenal informasi wisata dan memperoleh kemudahan
                dalam merencanakan kunjungan.
            </p>

            <p class="mt-4 leading-relaxed text-stone-600">
                Sistem informasi ini dirancang untuk mendukung pemesanan
                tiket serta pendataan pengunjung secara digital.
            </p>

            <a href="#pesan"
               class="mt-8 inline-flex rounded-full bg-emerald-800 px-6 py-3 font-semibold text-white hover:bg-emerald-900">
                Mulai Pesan Tiket →
            </a>
        </div>

        <div class="overflow-hidden rounded-3xl bg-emerald-100">
            <img
                src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=85"
                alt="Ilustrasi suasana alam dan wisata di Bali"
                class="h-[420px] w-full object-cover"
            >
        </div>
    </section>

    <!-- KUNJUNGAN -->
    <section id="kunjungan" class="bg-emerald-950 py-20 text-white">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <p class="font-semibold uppercase tracking-widest text-amber-300">
                        Statistik Wisata
                    </p>

                    <h2 class="mt-3 text-3xl font-bold md:text-4xl">
                        Informasi Kunjungan
                    </h2>

                    <p class="mt-3 max-w-xl text-emerald-100">
                        Pantau ringkasan kunjungan untuk membantu merencanakan
                        perjalanan ke Tadah Uwuk.
                    </p>
                </div>

                <span class="w-fit rounded-full bg-white/10 px-4 py-2 text-sm text-emerald-100">
                    Contoh tampilan statistik
                </span>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-sm text-emerald-200">Total Tiket Terbit</p>
                    <p class="mt-3 text-4xl font-bold">—</p>
                    <p class="mt-2 text-sm text-emerald-200">Menunggu integrasi database</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-sm text-emerald-200">Total Pengunjung</p>
                    <p class="mt-3 text-4xl font-bold">—</p>
                    <p class="mt-2 text-sm text-emerald-200">Data kunjungan tercatat</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-sm text-emerald-200">Tiket Tervalidasi</p>
                    <p class="mt-3 text-4xl font-bold">—</p>
                    <p class="mt-2 text-sm text-emerald-200">Menunggu integrasi pemindaian</p>
                </div>
            </div>

            <div class="mt-8 rounded-2xl bg-white p-6 text-stone-800 md:p-8">
                <h3 class="text-xl font-bold">Grafik Kunjungan Harian</h3>
                <p class="mt-2 text-sm text-stone-500">
                    Grafik akan menampilkan jumlah pengunjung berdasarkan
                    data yang tersimpan di sistem.
                </p>

                <div class="mt-6 flex h-40 items-center justify-center rounded-xl border-2 border-dashed border-stone-200 text-center text-stone-400">
                    Grafik ditampilkan setelah data kunjungan tersedia
                </div>
            </div>
        </div>
    </section>

    <!-- PESAN TIKET -->
    <section id="pesan" class="mx-auto max-w-5xl px-6 py-24 text-center">
        <div class="rounded-3xl bg-amber-50 px-6 py-12 md:px-16 md:py-16">
            <p class="font-bold uppercase tracking-widest text-emerald-700">
                Rencanakan Kunjungan
            </p>

            <h2 class="mt-4 text-3xl font-bold md:text-4xl">
                Siap Menjelajahi Tadah Uwuk?
            </h2>

            <p class="mx-auto mt-5 max-w-2xl leading-relaxed text-stone-600">
                Masuk ke akunmu untuk melanjutkan proses pemesanan tiket
                dan melihat informasi pemesanan.
            </p>

            <a href="{{ route('tickets.create') }}"
                class="mt-8 inline-flex rounded-full bg-emerald-800 px-8 py-3 font-bold text-white transition hover:bg-emerald-900">
                Masuk untuk Pesan Tiket →
            </a>

            <p class="mt-4 text-sm text-stone-500">
                Fitur pemesanan akan terhubung dengan sistem tiket.
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-stone-900 text-white">
        <div class="mx-auto flex max-w-7xl flex-col justify-between gap-8 px-6 py-12 md:flex-row">
            <div>
                <h2 class="text-2xl font-bold text-emerald-300">Tadah Uwuk.</h2>
                <p class="mt-3 max-w-sm text-sm leading-relaxed text-stone-400">
                    Sistem Informasi E-Ticket dan Pendataan Wisatawan
                    Berbasis Website.
                </p>
            </div>

            <div>
                <h3 class="font-bold">Navigasi</h3>
                <div class="mt-3 flex flex-col gap-2 text-sm text-stone-400">
                    <a href="#beranda" class="hover:text-white">Beranda</a>
                    <a href="#tentang" class="hover:text-white">Tentang Wisata</a>
                    <a href="#kunjungan" class="hover:text-white">Informasi Kunjungan</a>
                    <a href="#pesan" class="hover:text-white">Pemesanan Tiket</a>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10 px-6 py-5 text-center text-sm text-stone-500">
            © {{ date('Y') }} Tadah Uwuk. Sistem Informasi Pariwisata.
        </div>
    </footer>

</body>
</html>
