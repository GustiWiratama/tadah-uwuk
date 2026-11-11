
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email Tadah Uwuk</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h2>Selamat datang di Tadah Uwuk!</h2>

    <p>
        Terima kasih telah mendaftar. Untuk menyelesaikan
        pendaftaran, silakan verifikasi alamat email kamu
        dengan menekan tombol berikut.
    </p>

    <p style="margin: 28px 0;">
        <a href="{{ $verificationUrl }}"
           style="background-color: #065f46; color: white;
                  padding: 12px 22px; text-decoration: none;
                  border-radius: 8px;">
            Verifikasi Email
        </a>
    </p>

    <p>
        Tautan ini berlaku selama 30 menit dan hanya dapat
        digunakan satu kali.
    </p>

    <p>
        Jika kamu tidak merasa mendaftar di Tadah Uwuk,
        abaikan email ini.
    </p>

    <p>Salam,<br>Tim Tadah Uwuk</p>
</body>
</html>
