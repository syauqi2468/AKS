<?php
require_once 'confiq.php';

$errors = [];
success:
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $whatsapp = trim($_POST['whatsapp'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $namaSantri = trim($_POST['nama_santri'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    if ($nama === '') {
        $errors[] = 'Nama orang tua wajib diisi.';
    }
    if ($whatsapp === '') {
        $errors[] = 'Nomor WhatsApp wajib diisi.';
    }
    if ($email === '') {
        $errors[] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format email tidak valid.';
    }
    if ($namaSantri === '') {
        $errors[] = 'Nama santri / walsan wajib diisi.';
    }
    if ($password === '') {
        $errors[] = 'Password wajib diisi.';
    } elseif (strlen($password) < 6) {
        $errors[] = 'Password minimal 6 karakter.';
    }
    if ($confirmPassword !== $password) {
        $errors[] = 'Konfirmasi password tidak cocok.';
    }

    if (empty($errors)) {
        $checkStmt = $conn->prepare('SELECT id FROM wali WHERE email = ? LIMIT 1');
        $checkStmt->bind_param('s', $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errors[] = 'Email sudah digunakan. Silakan gunakan email lain atau login.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $conn->prepare('INSERT INTO wali (nama, whatsapp, email, pass, nama_santri) VALUES (?, ?, ?, ?, ?)');
            if ($insertStmt === false) {
                $errors[] = 'Terjadi kesalahan pada query: ' . $conn->error;
            } else {
                $insertStmt->bind_param('sssss', $nama, $whatsapp, $email, $passwordHash, $namaSantri);
                if ($insertStmt->execute()) {
                    $waliId = $conn->insert_id;
                    $santriStmt = $conn->prepare('INSERT INTO santri (nama, wali_id, saldo) VALUES (?, ?, 0)');
                    $santriStmt->bind_param('si', $namaSantri, $waliId);
                    $santriStmt->execute();
                    $successMessage = 'Pendaftaran berhasil. Silakan login menggunakan email dan password Anda.';
                    $_POST = [];
                } else {
                    $errors[] = 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.';
                }
                $insertStmt->close();
                $santriStmt->close();
            }
        }
        $checkStmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pendaftaran Wali Santri — Keuangan Santri</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --bg: #F3F7FF;
    --surface: #FFFFFF;
    --surface-strong: #F8FAFC;
    --text: #102A43;
    --text-muted: #64748B;
    --border: #D7E2F2;
    --blue: #2563EB;
    --orange: #F97316;
    --orange-soft: #FFEDD5;
    --shadow: 0 26px 70px rgba(15, 23, 42, 0.12);
  }
  html, body { min-height: 100%; font-family: 'DM Sans', sans-serif; background: radial-gradient(circle at top left, rgba(37, 99, 235, 0.14), transparent 36%), linear-gradient(180deg, #EAF2FF 0%, #F8FAFC 100%); color: var(--text); }
  body { display: flex; align-items: center; justify-content: center; padding: 32px; }
  .page { width: 100%; max-width: 1160px; display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 32px; align-items: center; }
  .hero-panel { background: linear-gradient(135deg, #2563EB 0%, #38BDF8 100%); border-radius: 32px; padding: 40px 36px; color: white; box-shadow: var(--shadow); position: relative; overflow: hidden; }
  .hero-panel::before { content: ''; position: absolute; right: -40px; top: -20px; width: 220px; height: 220px; background: rgba(255,255,255,0.15); border-radius: 50%; }
  .hero-panel::after { content: ''; position: absolute; left: -20px; bottom: -20px; width: 180px; height: 180px; background: rgba(255,255,255,0.08); border-radius: 50%; }
  .hero-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: clamp(2rem, 2.4vw, 3rem); line-height: 1.05; margin-bottom: 18px; }
  .hero-text { max-width: 460px; font-size: 1rem; line-height: 1.8; color: rgba(255,255,255,0.92); margin-bottom: 32px; }
  .hero-badge { display: inline-flex; align-items: center; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.18); border-radius: 999px; padding: 12px 18px; font-size: 0.92rem; gap: 10px; margin-bottom: 32px; }
  .hero-badge span { font-weight: 700; }
  .feature-list { display: grid; gap: 14px; }
  .feature-item { display: flex; align-items: flex-start; gap: 14px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.14); border-radius: 18px; padding: 16px; }
  .feature-icon { width: 42px; min-width: 42px; height: 42px; border-radius: 14px; background: rgba(255,255,255,0.18); display: grid; place-items: center; }
  .feature-icon svg { width: 20px; height: 20px; fill: white; }
  .feature-desc { font-size: 0.95rem; line-height: 1.6; color: rgba(255,255,255,0.92); }
  .form-card { background: var(--surface); border-radius: 32px; box-shadow: var(--shadow); padding: 38px 40px; }
  .form-header { margin-bottom: 28px; }
  .form-header h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: clamp(2rem, 2.2vw, 2.5rem); margin-bottom: 10px; color: var(--text); }
  .form-header p { color: var(--text-muted); font-size: 0.96rem; line-height: 1.7; }
  .form-grid { display: grid; gap: 18px; }
  .form-group { position: relative; }
  .form-label { display: block; margin-bottom: 10px; font-size: 0.92rem; font-weight: 700; color: var(--text); }
  .input-wrap { position: relative; }
  .input-wrap svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--blue); opacity: 0.7; }
  .form-input { width: 100%; padding: 14px 16px 14px 44px; border: 1px solid var(--border); border-radius: 16px; background: var(--surface-strong); color: var(--text); font-size: 0.96rem; transition: border-color 0.2s ease, background 0.2s ease; }
  .form-input:focus { outline: none; border-color: var(--blue); background: #FFFFFF; box-shadow: 0 0 0 3px rgba(37,99,235,0.08); }
  .btn-submit { width: 100%; padding: 16px; border: none; border-radius: 18px; font-size: 1rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--orange), #EA580C); cursor: pointer; transition: transform 0.2s ease, box-shadow 0.2s ease; box-shadow: 0 16px 30px rgba(249,115,22,0.24); }
  .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 20px 38px rgba(249,115,22,0.28); }
  .message { margin-bottom: 20px; padding: 16px 18px; border-radius: 18px; font-size: 0.95rem; line-height: 1.6; }
  .message.error { background: #FEF2F2; color: #B91C1C; border: 1px solid #FECACA; }
  .message.success { background: #ECFDF5; color: #166534; border: 1px solid #BBF7D0; }
  .link-row { text-align: center; margin-top: 20px; font-size: 0.95rem; color: var(--text-muted); }
  .link-row a { color: var(--blue); font-weight: 700; text-decoration: none; }
  .link-row a:hover { text-decoration: underline; }
  .hint-box { margin-top: 22px; padding: 16px 18px; background: #FFFBF2; border: 1px solid #FDE68A; border-radius: 18px; color: #92400E; font-size: 0.94rem; line-height: 1.65; }
  @media (max-width: 980px) { .page { grid-template-columns: 1fr; } }
  @media (max-width: 640px) { body { padding: 20px; } .hero-panel, .form-card { padding: 26px; } .hero-title { font-size: 2.2rem; } }
</style>
</head>
<body>
  <main class="page">
    <section class="hero-panel">
      <div class="hero-badge"><span>Daftar Akun Wali</span></div>
      <h2 class="hero-title">Akses kontrol keuangan santri jadi lebih mudah.</h2>
      <p class="hero-text">Daftarkan orang tua/wali dengan data valid agar setiap transaksi dapat tercatat rapi dan saldo anak otomatis terupdate.</p>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-.5 15H9v-2h2.5v2zm0-4H9V7h2.5v6z"/></svg></div>
          <div class="feature-desc">Data wali disimpan aman, sehingga login mudah dan transaksi terkelola.</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zM9 8h6v2H9V8zm0 4h4v2H9v-2z"/></svg></div>
          <div class="feature-desc">Nama santri / walsan langsung terhubung dengan akun wali.</div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 11H8v-2h4v2zm4-4H8V8h8v2z"/></svg></div>
          <div class="feature-desc">Informasi login juga berguna untuk notifikasi update saldo santri.</div>
        </div>
      </div>
    </section>

    <section class="form-card">
      <div class="form-header">
        <h1>Pendaftaran Wali Santri</h1>
        <p>Lengkapi data berikut agar akun Anda dapat digunakan untuk masuk dan memantau saldo santri.</p>
      </div>

      <?php if (!empty($errors)): ?>
        <div class="message error">
          <ul style="margin-left: 20px; padding-left: 0; list-style: disc;">
            <?php foreach ($errors as $error): ?>
              <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <?php if ($successMessage !== ''): ?>
        <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
      <?php endif; ?>

      <form method="post" action="pendaftaran.php" class="form-grid">
        <div class="form-group">
          <label class="form-label" for="nama">Nama Orang Tua</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/></svg>
            <input class="form-input" type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>" placeholder="Contoh: Bapak Haris Maulana" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="whatsapp">Nomor WhatsApp</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M17.53 7.47a7.27 7.27 0 0 0-10.29 0A7.29 7.29 0 0 0 6 15.8V18l1.86-1.9A7.29 7.29 0 0 0 15.8 18a7.27 7.27 0 0 0 1.73-14.53zM12 16c-2.21 0-4-1.79-4-4 0-.9.31-1.73.84-2.39l.16-.16.24-.24c.64-.64 1.5-1.06 2.43-1.06.92 0 1.79.36 2.44 1.02l.48.48c.66.66 1.02 1.52 1.02 2.43 0 2.21-1.79 4-4 4z"/></svg>
            <input class="form-input" type="text" id="whatsapp" name="whatsapp" value="<?php echo htmlspecialchars($_POST['whatsapp'] ?? ''); ?>" placeholder="Contoh: 081234567890" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="email">Email</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
            <input class="form-input" type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" placeholder="contoh@gmail.com" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="nama_santri">Nama Santri / Walsan</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/></svg>
            <input class="form-input" type="text" id="nama_santri" name="nama_santri" value="<?php echo htmlspecialchars($_POST['nama_santri'] ?? ''); ?>" placeholder="Contoh: Ahmad Fauzi" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6-7h-1V7a5 5 0 0 0-10 0v3H6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm-8-3a3 3 0 0 1 6 0v3H10V7z"/></svg>
            <input class="form-input" type="password" id="password" name="password" placeholder="Minimal 6 karakter" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="confirm_password">Konfirmasi Password</label>
          <div class="input-wrap">
            <svg viewBox="0 0 24 24"><path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6-7h-1V7a5 5 0 0 0-10 0v3H6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm-8-3a3 3 0 0 1 6 0v3H10V7z"/></svg>
            <input class="form-input" type="password" id="confirm_password" name="confirm_password" placeholder="Masukkan ulang password" required>
          </div>
        </div>

        <button class="btn-submit" type="submit">Daftar Sekarang</button>
      </form>

      <div class="hint-box">Pastikan email dan nomor WhatsApp valid. Data ini akan digunakan untuk login dan notifikasi saldo santri.</div>
      <div class="link-row">Sudah punya akun? <a href="login.php">Masuk ke halaman login</a></div>
    </section>
  </main>
</body>
</html>
