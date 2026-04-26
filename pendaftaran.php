<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login — Keuangan Santri Sekolah Impian</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  /* ... (CSS sama persis seperti sebelumnya, tidak berubah) ... */
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --orange: #F97316; --orange-d: #C2560A; --orange-l: #FDBA74; --orange-xl: #FFF3E8;
    --green: #16A34A; --green-d: #14532D; --green-l: #86EFAC; --green-xl: #F0FDF4;
    --blue: #1D4ED8; --blue-m: #2563EB; --blue-l: #93C5FD; --blue-xl: #EFF6FF;
    --teal: #0891B2;
    --white: #FFFFFF;
    --gray-50: #F8FAFC; --gray-100: #F1F5F9; --gray-200: #E2E8F0;
    --gray-400: #94A3B8; --gray-500: #64748B; --gray-600: #475569;
    --gray-700: #334155; --gray-800: #1E293B; --gray-900: #0F172A;
  }
  html, body { width: 100%; height: 100%; font-family: 'DM Sans', sans-serif; }
  body {
    display: flex;
    min-height: 100vh;
    background: var(--gray-900);
    overflow-x: hidden;
  }
  .left-panel {
    flex: 1;
    background: linear-gradient(145deg, #0F172A 0%, #1E293B 40%, #0C1A3A 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 48px;
    position: relative;
    overflow: hidden;
  }
  .left-panel::before {
    content: '';
    position: absolute;
    top: -120px; left: -120px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(249,115,22,0.15) 0%, transparent 65%);
    pointer-events: none;
  }
  .left-panel::after {
    content: '';
    position: absolute;
    bottom: -100px; right: -80px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(37,99,235,0.12) 0%, transparent 65%);
    pointer-events: none;
  }
  .brand-wrap {
    text-align: center;
    position: relative; z-index: 1;
    animation: fadeUp 0.7s ease both;
  }
  .brand-icon {
    width: 88px; height: 88px;
    background: linear-gradient(135deg, var(--orange), #EA580C);
    border-radius: 24px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 24px;
    box-shadow: 0 12px 40px rgba(249,115,22,0.35);
    position: relative;
  }
  .brand-icon::after {
    content: '';
    position: absolute; inset: -3px;
    border-radius: 27px;
    border: 2px solid rgba(249,115,22,0.25);
  }
  .brand-icon svg { width: 46px; height: 46px; fill: white; }
  .brand-name {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 30px; font-weight: 900;
    color: white; line-height: 1.15;
    margin-bottom: 8px;
  }
  .brand-name span { color: var(--orange-l); }
  .brand-tagline {
    font-size: 15px; color: rgba(255,255,255,0.5);
    line-height: 1.5; max-width: 280px; margin: 0 auto 48px;
  }
  .feature-list { width: 100%; max-width: 320px; }
  .feature-item {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 18px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 14px;
    margin-bottom: 10px;
    animation: fadeUp 0.7s ease both;
  }
  .feature-item:nth-child(1) { animation-delay: 0.1s; }
  .feature-item:nth-child(2) { animation-delay: 0.2s; }
  .feature-item:nth-child(3) { animation-delay: 0.3s; }
  .feature-item:nth-child(4) { animation-delay: 0.4s; }
  .feat-icon {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .feat-icon.o { background: rgba(249,115,22,0.15); color: var(--orange-l); }
  .feat-icon.b { background: rgba(37,99,235,0.15); color: var(--blue-l); }
  .feat-icon.g { background: rgba(22,163,74,0.15); color: var(--green-l); }
  .feat-icon.t { background: rgba(8,145,178,0.12); color: #67E8F9; }
  .feat-icon svg { width: 18px; height: 18px; }
  .feat-text { font-size: 13px; color: rgba(255,255,255,0.65); font-weight: 500; }
  .right-panel {
    width: 460px; min-width: 460px;
    background: var(--white);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 48px;
    position: relative;
  }
  .login-form-wrap {
    width: 100%;
    animation: fadeUp 0.5s ease both 0.15s;
  }
  .form-header { margin-bottom: 36px; }
  .form-header h2 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 28px; font-weight: 800;
    color: var(--gray-900); margin-bottom: 6px;
  }
  .form-header p { font-size: 14px; color: var(--gray-500); }
  .form-header p span { color: var(--orange); font-weight: 600; }
  .form-group { margin-bottom: 20px; }
  .form-label {
    display: block; font-size: 13px; font-weight: 600;
    color: var(--gray-700); margin-bottom: 8px;
  }
  .input-wrap { position: relative; }
  .input-wrap svg {
    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
    width: 18px; height: 18px; color: var(--gray-400);
    pointer-events: none;
  }
  .form-input {
    width: 100%; padding: 13px 14px 13px 44px;
    border: 1.5px solid var(--gray-200);
    border-radius: 12px; font-size: 14px;
    font-family: 'DM Sans', sans-serif;
    color: var(--gray-800); background: var(--gray-50);
    outline: none; transition: all 0.2s;
  }
  .form-input:focus {
    border-color: var(--orange);
    background: white;
    box-shadow: 0 0 0 4px rgba(249,115,22,0.1);
  }
  .form-input::placeholder { color: var(--gray-400); }
  .toggle-pass {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer;
    color: var(--gray-400); padding: 2px;
  }
  .toggle-pass:hover { color: var(--orange); }
  .toggle-pass svg { width: 18px; height: 18px; display: block; }
  .forgot-link {
    text-align: right; margin-top: -12px; margin-bottom: 20px;
  }
  .forgot-link a {
    font-size: 12px; color: var(--orange); font-weight: 600;
    text-decoration: none;
  }
  .forgot-link a:hover { text-decoration: underline; }
  .error-box {
    background: #FEF2F2; border: 1.5px solid #FECACA;
    color: #B91C1C; border-radius: 10px;
    padding: 12px 16px; font-size: 13px;
    margin-bottom: 18px; display: none;
    align-items: center; gap: 8px;
  }
  .error-box svg { width: 16px; height: 16px; flex-shrink: 0; }
  .btn-masuk {
    width: 100%; padding: 15px;
    background: linear-gradient(135deg, var(--orange) 0%, #EA580C 100%);
    color: white; border: none; border-radius: 14px;
    font-size: 15px; font-weight: 700;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer; transition: all 0.2s;
    box-shadow: 0 6px 20px rgba(249,115,22,0.35);
    letter-spacing: 0.5px;
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .btn-masuk:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(249,115,22,0.45);
  }
  .btn-masuk:active { transform: translateY(0); }
  .btn-masuk svg { width: 18px; height: 18px; }
  .demo-hint {
    text-align: center; margin-top: 20px;
    padding: 12px 16px; background: var(--orange-xl);
    border-radius: 10px; border: 1px solid #FED7AA;
  }
  .demo-hint p { font-size: 12px; color: var(--orange-d); font-weight: 500; }
  .demo-hint strong { font-weight: 700; }
  .form-footer {
    text-align: center; margin-top: 28px;
    font-size: 12px; color: var(--gray-400);
    border-top: 1px solid var(--gray-200);
    padding-top: 20px;
  }
  .form-footer span { color: var(--orange); font-weight: 600; }
  .spinner { display: none; width: 18px; height: 18px; border: 2px solid rgba(255,255,255,0.4); border-top-color: white; border-radius: 50%; animation: spin 0.6s linear infinite; }
  @keyframes spin { to { transform: rotate(360deg); } }
  @keyframes fadeUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
  @media (max-width: 900px) {
    .left-panel { display: none; }
    .right-panel { width: 100%; min-width: 0; min-height: 100vh; padding: 40px 28px; }
  }
  @media (max-width: 480px) {
    .right-panel { padding: 32px 20px; }
    .form-header h2 { font-size: 24px; }
  }
</style>
</head>
<body>
  <div class="left-panel">
    <div class="brand-wrap">
      <div class="brand-icon">
        <svg viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h6v-5h2v5h6v-8h3L12 3zm0 12.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
      </div>
      <h1 class="brand-name">Keuangan <span>Santri</span></h1>
      <p class="brand-tagline">Portal Wali Santri — Sekolah Impian. Pantau & kelola keuangan putra/putri Anda dengan mudah.</p>
    </div>
    <div class="feature-list">
      <div class="feature-item"><div class="feat-icon o"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg></div><span class="feat-text">Monitor saldo santri secara real-time</span></div>
      <div class="feature-item"><div class="feat-icon b"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg></div><span class="feat-text">Transfer saldo kapan saja & di mana saja</span></div>
      <div class="feature-item"><div class="feat-icon g"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg></div><span class="feat-text">Riwayat transaksi lengkap & terperinci</span></div>
      <div class="feature-item"><div class="feat-icon t"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg></div><span class="feat-text">Info lengkap data & profil anak</span></div>
    </div>
  </div>
  <div class="right-panel">
    <div class="login-form-wrap">
      <div class="form-header"><h2>Selamat Datang 👋</h2><p>Masuk sebagai <span>Wali Santri</span> untuk memantau keuangan anak Anda</p></div>
      <div class="error-box" id="err-box"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/></svg><span id="err-msg">Email atau password salah.</span></div>
      <div class="form-group"><label class="form-label">Email / Gmail</label><div class="input-wrap"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg><input type="email" class="form-input" id="inp-email" placeholder="contoh@gmail.com" /></div></div>
      <div class="form-group"><label class="form-label">Password</label><div class="input-wrap"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg><input type="password" class="form-input" id="inp-pass" placeholder="Masukkan password" /><button class="toggle-pass" onclick="togglePass()" type="button" id="toggle-btn"><svg id="eye-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg></button></div></div>
      <div class="forgot-link"><a href="#">Lupa Password?</a></div>
      <button class="btn-masuk" onclick="doLogin()" id="btn-masuk"><span id="btn-label">MASUK</span><svg id="btn-arrow" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg><div class="spinner" id="spinner"></div></button>
      <div class="demo-hint"><p>🔑 Demo: Email apa saja + Password: <strong>12345</strong></p></div>
      <div class="form-footer"><p>Belum punya akun? <a href="pendaftaran.php" style="color: var(--orange); text-decoration: none; font-weight: 700;">Daftar di sini</a></p></div>
      <div class="form-footer"><p>Butuh bantuan? Hubungi <span>Admin Sekolah Impian</span></p></div>
    </div>
  </div>
<script>
  let passVisible = false;
  function togglePass() {
    passVisible = !passVisible;
    const inp = document.getElementById('inp-pass');
    inp.type = passVisible ? 'text' : 'password';
    document.getElementById('eye-icon').innerHTML = passVisible
      ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22"/>'
      : '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
  }
  document.getElementById('inp-pass').addEventListener('keydown', e => { if(e.key==='Enter') doLogin(); });

  function doLogin() {
    const email = document.getElementById('inp-email').value.trim();
    const pass  = document.getElementById('inp-pass').value.trim();
    const errBox = document.getElementById('err-box');
    const errMsg = document.getElementById('err-msg');
    if (!email) { showErr('Email wajib diisi.'); return; }
    if (!pass)  { showErr('Password wajib diisi.'); return; }
    if (pass !== '12345') { showErr('Email atau password salah. Silakan coba lagi.'); return; }
    errBox.style.display = 'none';
    document.getElementById('btn-label').textContent = 'Masuk...';
    document.getElementById('btn-arrow').style.display = 'none';
    document.getElementById('spinner').style.display = 'block';
    // Simpan user ke localStorage
    localStorage.setItem('keuanganSantri_user', JSON.stringify({ email: email, name: 'Haris Maulana' }));
    setTimeout(() => { window.location.href = 'beranda.php'; }, 900);
  }
  function showErr(msg) {
    const b = document.getElementById('err-box');
    document.getElementById('err-msg').textContent = msg;
    b.style.display = 'flex';
    b.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
</script>
</body>
</html>