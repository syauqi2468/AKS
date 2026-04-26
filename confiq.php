<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beranda — Keuangan Santri</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  /* ===== CSS SAMA PERSIS SEPERTI FILE ASLI ===== */
  /* (Saya sertakan ulang agar lengkap, tapi Anda bisa gunakan CSS yang sudah ada) */
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --orange: #F97316; --orange-d: #C2560A; --orange-l: #FDBA74; --orange-xl: #FFF3E8;
    --green: #16A34A; --green-d: #14532D; --green-l: #86EFAC; --green-xl: #F0FDF4;
    --blue: #1D4ED8; --blue-m: #2563EB; --blue-l: #93C5FD; --blue-xl: #EFF6FF;
    --red: #DC2626; --red-xl: #FEF2F2; --red-l: #FECACA;
    --white: #FFFFFF;
    --gray-50: #F8FAFC; --gray-100: #F1F5F9; --gray-200: #E2E8F0;
    --gray-400: #94A3B8; --gray-500: #64748B; --gray-600: #475569;
    --gray-700: #334155; --gray-800: #1E293B; --gray-900: #0F172A;
    --sidebar-w: 240px;
  }
  html, body { width: 100%; height: 100%; font-family: 'DM Sans', sans-serif; background: var(--gray-100); color: var(--gray-800); }
  body { display: flex; flex-direction: column; min-height: 100vh; }
  .topbar { height: 62px; background: var(--white); border-bottom: 1px solid var(--gray-200); display: flex; align-items: center; justify-content: space-between; padding: 0 28px; position: sticky; top: 0; z-index: 200; box-shadow: 0 1px 4px rgba(0,0,0,0.06); flex-shrink: 0; }
  .topbar-brand { display: flex; align-items: center; gap: 10px; }
  .topbar-logo { width: 36px; height: 36px; border-radius: 10px; background: linear-gradient(135deg, var(--orange), #EA580C); display: flex; align-items: center; justify-content: center; }
  .topbar-logo svg { width: 20px; height: 20px; fill: white; }
  .topbar-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 17px; font-weight: 800; color: var(--gray-900); }
  .topbar-title span { color: var(--orange); }
  .topbar-right { display: flex; align-items: center; gap: 10px; }
  .topbar-notif { width: 36px; height: 36px; border-radius: 10px; border: 1.5px solid var(--gray-200); background: var(--gray-50); display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--gray-500); position: relative; transition: all 0.15s; }
  .topbar-notif:hover { border-color: var(--orange-l); background: var(--orange-xl); }
  .topbar-notif svg { width: 18px; height: 18px; }
  .notif-dot { position: absolute; top: -2px; right: -2px; width: 10px; height: 10px; background: var(--orange); border-radius: 50%; border: 2px solid white; }
  .topbar-user { display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 5px 10px; border-radius: 10px; transition: background 0.15s; }
  .topbar-user:hover { background: var(--gray-100); }
  .user-avatar { width: 34px; height: 34px; border-radius: 9px; background: linear-gradient(135deg, var(--blue-m), #0891B2); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: white; }
  .user-info { display: flex; flex-direction: column; }
  .user-name { font-size: 13px; font-weight: 600; color: var(--gray-800); line-height: 1.2; }
  .user-role { font-size: 11px; color: var(--gray-500); }
  .btn-logout { padding: 7px 14px; background: none; border: 1.5px solid var(--gray-200); border-radius: 8px; font-size: 12px; font-weight: 600; color: var(--gray-500); cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.15s; }
  .btn-logout:hover { border-color: var(--red-l); color: var(--red); background: var(--red-xl); }
  .hamburger { display: none; background: none; border: none; cursor: pointer; flex-direction: column; gap: 5px; padding: 4px; }
  .hamburger span { display: block; width: 22px; height: 2px; background: var(--gray-600); border-radius: 2px; }
  .app-wrap { display: flex; flex: 1; overflow: hidden; }
  .sidebar { width: var(--sidebar-w); background: var(--white); border-right: 1px solid var(--gray-200); padding: 24px 12px; display: flex; flex-direction: column; flex-shrink: 0; overflow-y: auto; }
  .nav-section-label { font-size: 10px; font-weight: 700; letter-spacing: 0.1em; color: var(--gray-400); text-transform: uppercase; padding: 0 10px; margin: 12px 0 6px; }
  .nav-item { display: flex; align-items: center; gap: 11px; padding: 11px 12px; border-radius: 12px; font-size: 14px; font-weight: 600; color: var(--gray-600); cursor: pointer; transition: all 0.15s; text-decoration: none; margin-bottom: 2px; }
  .nav-item svg { width: 19px; height: 19px; flex-shrink: 0; }
  .nav-item:hover { background: var(--gray-100); color: var(--gray-900); }
  .nav-item.active { background: var(--orange-xl); color: var(--orange-d); }
  .nav-item.active svg { color: var(--orange); }
  .sidebar-divider { height: 1px; background: var(--gray-200); margin: 12px 4px; }
  .sidebar-footer { margin-top: auto; padding: 14px 12px; background: linear-gradient(135deg, #0F172A, #1E293B); border-radius: 14px; text-align: center; }
  .sidebar-footer p { font-size: 12px; color: rgba(255,255,255,0.5); margin-bottom: 4px; }
  .sidebar-footer strong { font-size: 13px; color: var(--orange-l); font-weight: 700; }
  .main { flex: 1; overflow-y: auto; padding: 28px 32px; }
  .page-head { margin-bottom: 24px; }
  .page-head h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 24px; font-weight: 800; color: var(--gray-900); }
  .page-head p { font-size: 13px; color: var(--gray-500); margin-top: 3px; }
  .balance-card { background: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 50%, #0891B2 100%); border-radius: 20px; padding: 28px 32px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; position: relative; overflow: hidden; box-shadow: 0 8px 28px rgba(29,78,216,0.35); }
  .balance-card::before { content: ''; position: absolute; top: -60px; right: -60px; width: 220px; height: 220px; background: rgba(255,255,255,0.06); border-radius: 50%; }
  .balance-card::after { content: ''; position: absolute; bottom: -40px; right: 80px; width: 160px; height: 160px; background: rgba(255,255,255,0.04); border-radius: 50%; }
  .bal-left { position: relative; z-index: 1; }
  .bal-label { font-size: 12px; color: rgba(255,255,255,0.65); font-weight: 600; letter-spacing: 0.05em; margin-bottom: 8px; }
  .bal-amount { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 40px; font-weight: 900; color: white; letter-spacing: -1px; margin-bottom: 8px; }
  .bal-updated { font-size: 11px; color: rgba(255,255,255,0.5); }
  .bal-right { position: relative; z-index: 1; }
  .bal-santri { text-align: right; display: flex; flex-direction: column; align-items: flex-end; gap: 10px; }
  .bal-avatar { width: 56px; height: 56px; border-radius: 14px; background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3); display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 800; color: white; }
  .bal-santri-name { font-size: 15px; font-weight: 700; color: white; }
  .bal-santri-kelas { font-size: 12px; color: rgba(255,255,255,0.65); }
  .quick-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 20px; }
  .quick-card { background: var(--white); border: 1.5px solid var(--gray-200); border-radius: 16px; padding: 20px 16px; display: flex; flex-direction: column; align-items: center; gap: 10px; cursor: pointer; transition: all 0.2s; box-shadow: 0 1px 4px rgba(0,0,0,0.05); text-decoration: none; }
  .quick-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); border-color: var(--orange-l); }
  .qc-icon { width: 46px; height: 46px; border-radius: 13px; display: flex; align-items: center; justify-content: center; }
  .qc-icon svg { width: 22px; height: 22px; }
  .qc-icon.o { background: var(--orange-xl); color: var(--orange-d); }
  .qc-icon.b { background: var(--blue-xl); color: var(--blue); }
  .qc-icon.g { background: var(--green-xl); color: var(--green-d); }
  .quick-card span { font-size: 13px; font-weight: 600; color: var(--gray-700); }
  .stat-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 24px; }
  .stat-card { background: var(--white); border-radius: 16px; border: 1.5px solid var(--gray-200); padding: 20px 22px; box-shadow: 0 1px 4px rgba(0,0,0,0.05); }
  .stat-card .sc-icon-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
  .sc-icon { width: 40px; height: 40px; border-radius: 11px; display: flex; align-items: center; justify-content: center; }
  .sc-icon svg { width: 20px; height: 20px; }
  .sc-icon.g { background: var(--green-xl); color: var(--green); }
  .sc-icon.r { background: var(--red-xl); color: var(--red); }
  .sc-badge { font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
  .sc-badge.g { background: var(--green-xl); color: var(--green-d); }
  .sc-badge.r { background: var(--red-xl); color: var(--red); }
  .stat-card .sc-label { font-size: 12px; color: var(--gray-500); font-weight: 600; margin-bottom: 4px; }
  .stat-card .sc-val { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 22px; font-weight: 800; }
  .stat-card.income .sc-val { color: var(--green); }
  .stat-card.expense .sc-val { color: var(--red); }
  .card-box { background: var(--white); border-radius: 16px; border: 1.5px solid var(--gray-200); box-shadow: 0 1px 4px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 20px; }
  .card-head { display: flex; align-items: center; justify-content: space-between; padding: 18px 22px 14px; border-bottom: 1px solid var(--gray-100); }
  .card-head h3 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; color: var(--gray-900); }
  .link-all { font-size: 13px; color: var(--orange); font-weight: 600; cursor: pointer; text-decoration: none; }
  .link-all:hover { text-decoration: underline; }
  .tx-item { display: flex; align-items: center; gap: 13px; padding: 14px 22px; border-bottom: 1px solid var(--gray-100); transition: background 0.12s; }
  .tx-item:last-child { border-bottom: none; }
  .tx-item:hover { background: var(--gray-50); }
  .tx-ico { width: 40px; height: 40px; border-radius: 11px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .tx-ico.out { background: var(--red-xl); color: var(--red); }
  .tx-ico.in  { background: var(--green-xl); color: var(--green); }
  .tx-ico svg { width: 18px; height: 18px; }
  .tx-info { flex: 1; }
  .tx-name { font-size: 14px; font-weight: 600; color: var(--gray-800); }
  .tx-date { font-size: 11px; color: var(--gray-400); margin-top: 2px; }
  .tx-amount { font-size: 14px; font-weight: 700; }
  .tx-amount.out { color: var(--red); }
  .tx-amount.in  { color: var(--green); }
  .bottom-nav { display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--white); border-top: 1px solid var(--gray-200); height: 64px; z-index: 300; box-shadow: 0 -4px 16px rgba(0,0,0,0.07); }
  .bnav-inner { display: flex; height: 100%; }
  .bnav-btn { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; cursor: pointer; color: var(--gray-400); text-decoration: none; transition: color 0.15s; }
  .bnav-btn.active { color: var(--orange); }
  .bnav-btn svg { width: 22px; height: 22px; }
  .bnav-btn span { font-size: 10px; font-weight: 600; }
  @media (max-width: 900px) {
    .sidebar { display: none; }
    .hamburger { display: flex; }
    .main { padding: 20px 16px 80px; }
    .bal-amount { font-size: 30px; }
    .bottom-nav { display: block; }
    .topbar-user .user-info { display: none; }
    .btn-logout { display: none; }
    .quick-grid { grid-template-columns: repeat(3, 1fr); gap: 10px; }
  }
  @media (max-width: 480px) {
    .topbar { padding: 0 16px; }
    .balance-card { flex-direction: column; align-items: flex-start; gap: 16px; padding: 22px 22px; }
    .bal-right { align-self: flex-start; }
    .bal-santri { flex-direction: row; align-items: center; }
    .stat-row { grid-template-columns: 1fr 1fr; }
  }
  .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 250; }
  .sidebar-overlay.open { display: block; }
  .sidebar.open { display: flex !important; position: fixed; top: 62px; left: 0; bottom: 0; z-index: 260; }
  /* tambahan dropdown santri */
  .santri-selector { margin-bottom: 20px; display: flex; justify-content: flex-end; }
  .santri-dropdown { padding: 8px 16px; border-radius: 20px; border: 1.5px solid var(--gray-200); background: var(--white); font-weight: 600; font-size: 13px; color: var(--gray-700); cursor: pointer; outline: none; }
</style>
</head>
<body>
<header class="topbar">
  <div class="topbar-brand">
    <button class="hamburger" onclick="toggleSidebar()"><span></span><span></span><span></span></button>
    <div class="topbar-logo"><svg viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h6v-5h2v5h6v-8h3L12 3z"/></svg></div>
    <span class="topbar-title">Keuangan <span>Santri</span></span>
  </div>
  <div class="topbar-right">
    <div class="topbar-notif"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg><span class="notif-dot"></span></div>
    <div class="topbar-user"><div class="user-avatar">HM</div><div class="user-info"><span class="user-name">Haris Maulana</span><span class="user-role">Wali Santri</span></div></div>
    <button class="btn-logout" onclick="logout()">Keluar</button>
  </div>
</header>
<div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>
<div class="app-wrap">
  <nav class="sidebar" id="sidebar">
    <div class="nav-section-label">Menu Utama</div>
    <a class="nav-item active" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>Beranda</a>
    <a class="nav-item" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg>Transfer Saldo</a>
    <a class="nav-item" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>Riwayat</a>
    <a class="nav-item" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>Info Anak</a>
    <div class="sidebar-divider"></div>
    <div class="sidebar-footer"><p>Versi 1.0.0</p><strong>Sekolah Impian</strong></div>
  </nav>
  <main class="main">
    <div class="page-head">
      <h1>Selamat Datang, Bapak Haris 👋</h1>
      <p>Pantau keuangan santri Anda</p>
    </div>
    <div class="santri-selector">
      <select id="santriSelect" class="santri-dropdown" onchange="gantiSantri()"></select>
    </div>
    <div class="balance-card">
      <div class="bal-left"><p class="bal-label">SALDO TERSEDIA</p><p class="bal-amount" id="saldoAmount">Rp 0</p><p class="bal-updated">Terakhir diperbarui: <span id="lastUpdate">-</span></p></div>
      <div class="bal-right"><div class="bal-santri"><div class="bal-avatar" id="santriAvatar">AF</div><div><p class="bal-santri-name" id="santriName">Ahmad Fauzi</p><p class="bal-santri-kelas" id="santriKelas">Kelas 10 · Pondok Putra</p></div></div></div>
    </div>
    <div class="quick-grid">
      <a class="quick-card" href="transfer.php"><div class="qc-icon o"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg></div><span>Transfer</span></a>
      <a class="quick-card" href="riwayat.php"><div class="qc-icon b"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg></div><span>Riwayat</span></a>
      <a class="quick-card" href="infoanak.php"><div class="qc-icon g"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg></div><span>Info Anak</span></a>
    </div>
    <div class="stat-row">
      <div class="stat-card income"><div class="sc-icon-row"><div class="sc-icon g"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg></div><span class="sc-badge g">Bulan ini</span></div><p class="sc-label">Total Pemasukan</p><p class="sc-val" id="totalMasuk">Rp 0</p></div>
      <div class="stat-card expense"><div class="sc-icon-row"><div class="sc-icon r"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/></svg></div><span class="sc-badge r">Bulan ini</span></div><p class="sc-label">Total Pengeluaran</p><p class="sc-val" id="totalKeluar">Rp 0</p></div>
    </div>
    <div class="card-box"><div class="card-head"><h3>Transaksi Terakhir</h3><a class="link-all" href="riwayat.html">Lihat Semua →</a></div><div id="recentTxList"></div></div>
  </main>
</div>
<nav class="bottom-nav"><div class="bnav-inner">
  <a class="bnav-btn active" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg><span>Beranda</span></a>
  <a class="bnav-btn" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg><span>Transfer</span></a>
  <a class="bnav-btn" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg><span>Riwayat</span></a>
  <a class="bnav-btn" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg><span>Info Anak</span></a>
</div></nav>
<script>
  // Data awal untuk localStorage jika belum ada
  function initData() {
    if (!localStorage.getItem('keuanganSantri_data')) {
      const data = {
        santriList: [
          { id: "santri1", name: "Ahmad Fauzi", avatar: "AF", kelas: "Kelas 10 · Pondok Putra", nis: "20250041", tempatLahir: "Depok, Jawa Barat", tanggalLahir: "14 Maret 2009", jenisKelamin: "Laki-laki", tahunMasuk: 2024, asrama: "Pondok Putra A", nomorKamar: "Kamar 07", pembimbing: "Ust. Hendra, S.Pd", waliKelas: "Bu Rahmah, M.Pd", jurusan: "IPA (Sains)", status: "Aktif", namaWali: "Bpk. Haris Maulana", hubungan: "Ayah Kandung", noTelepon: "0812-3456-7890", emailWali: "haris.maulana@gmail.com", alamat: "Jl. Cempaka No. 12, Depok", prestasi: [{ nama: "Juara 1 MTQ Tingkat Kecamatan", tahun: "April 2025", level: "Juara 1" }, { nama: "Santri Terdisiplin Semester 1", tahun: "Desember 2024", level: "Terpilih" }], saldo: 250000, riwayat: [
            { id: "tx1", type: "keluar", nama: "Jajan Kantin", tanggal: "12 Mei 2025 · 10:30", amount: 15000, kategori: "Konsumsi" },
            { id: "tx2", type: "masuk", nama: "Transfer dari Anda", tanggal: "10 Mei 2025 · 08:15", amount: 200000, kategori: "Transfer Masuk" },
            { id: "tx3", type: "keluar", nama: "Fotocopy", tanggal: "08 Mei 2025 · 12:00", amount: 5000, kategori: "Keperluan" },
            { id: "tx4", type: "keluar", nama: "Belanja ATK", tanggal: "05 Mei 2025 · 09:40", amount: 30000, kategori: "Perlengkapan" },
            { id: "tx5", type: "masuk", nama: "Transfer dari Anda", tanggal: "01 Mei 2025 · 07:00", amount: 300000, kategori: "Transfer Masuk" }
          ] },
          { id: "santri2", name: "Fatimah Azzahra", avatar: "FA", kelas: "Kelas 8 · Pondok Putri", nis: "20250088", tempatLahir: "Depok, Jawa Barat", tanggalLahir: "20 Juli 2011", jenisKelamin: "Perempuan", tahunMasuk: 2025, asrama: "Pondok Putri B", nomorKamar: "Kamar 12", pembimbing: "Ust. Nisa, S.Ag", waliKelas: "Bu Lilis, M.Pd", jurusan: "IPS", status: "Aktif", namaWali: "Bpk. Haris Maulana", hubungan: "Ayah Kandung", noTelepon: "0812-3456-7890", emailWali: "haris.maulana@gmail.com", alamat: "Jl. Cempaka No. 12, Depok", prestasi: [{ nama: "Juara 2 Lomba Kaligrafi", tahun: "Maret 2025", level: "Juara 2" }], saldo: 150000, riwayat: [
            { id: "ftx1", type: "masuk", nama: "Transfer dari Anda", tanggal: "09 Mei 2025 · 19:00", amount: 100000, kategori: "Transfer Masuk" },
            { id: "ftx2", type: "keluar", nama: "Jajan Kantin", tanggal: "11 Mei 2025 · 13:20", amount: 10000, kategori: "Konsumsi" }
          ] }
        ],
        currentSantriId: "santri1"
      };
      localStorage.setItem('keuanganSantri_data', JSON.stringify(data));
    }
  }

  function getData() { return JSON.parse(localStorage.getItem('keuanganSantri_data')); }
  function saveData(data) { localStorage.setItem('keuanganSantri_data', JSON.stringify(data)); }

  let currentSantri = null;
  function loadSantriDropdown() {
    const data = getData();
    const select = document.getElementById('santriSelect');
    select.innerHTML = '';
    data.santriList.forEach(s => {
      const opt = document.createElement('option');
      opt.value = s.id;
      opt.textContent = s.name;
      if (s.id === data.currentSantriId) opt.selected = true;
      select.appendChild(opt);
    });
    currentSantri = data.santriList.find(s => s.id === data.currentSantriId);
    renderBeranda();
  }

  function gantiSantri() {
    const select = document.getElementById('santriSelect');
    const newId = select.value;
    const data = getData();
    data.currentSantriId = newId;
    saveData(data);
    currentSantri = data.santriList.find(s => s.id === newId);
    renderBeranda();
  }

  function renderBeranda() {
    if (!currentSantri) return;
    document.getElementById('saldoAmount').innerHTML = `Rp ${currentSantri.saldo.toLocaleString('id-ID')}`;
    document.getElementById('lastUpdate').innerText = new Date().toLocaleDateString('id-ID');
    document.getElementById('santriAvatar').innerText = currentSantri.avatar;
    document.getElementById('santriName').innerText = currentSantri.name;
    document.getElementById('santriKelas').innerText = currentSantri.kelas;
    // hitung total masuk & keluar bulan ini (Mei 2025)
    const bulanIni = "Mei 2025";
    let totalMasuk = 0, totalKeluar = 0;
    currentSantri.riwayat.forEach(tx => {
      if (tx.tanggal.includes(bulanIni)) {
        if (tx.type === 'masuk') totalMasuk += tx.amount;
        else totalKeluar += tx.amount;
      }
    });
    document.getElementById('totalMasuk').innerHTML = `Rp ${totalMasuk.toLocaleString('id-ID')}`;
    document.getElementById('totalKeluar').innerHTML = `Rp ${totalKeluar.toLocaleString('id-ID')}`;
    // 3 transaksi terakhir
    const recent = [...currentSantri.riwayat].reverse().slice(0, 3);
    const container = document.getElementById('recentTxList');
    container.innerHTML = '';
    recent.forEach(tx => {
      const div = document.createElement('div');
      div.className = 'tx-item';
      div.innerHTML = `
        <div class="tx-ico ${tx.type === 'masuk' ? 'in' : 'out'}"><svg viewBox="0 0 24 24" fill="currentColor"><path d="${tx.type === 'masuk' ? 'M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z' : 'M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z'}"/></svg></div>
        <div class="tx-info"><p class="tx-name">${tx.nama}</p><p class="tx-date">${tx.tanggal}</p></div>
        <span class="tx-amount ${tx.type === 'masuk' ? 'in' : 'out'}">${tx.type === 'masuk' ? '+' : '-'} Rp ${tx.amount.toLocaleString('id-ID')}</span>
      `;
      container.appendChild(div);
    });
  }

  function logout() {
    localStorage.removeItem('keuanganSantri_user');
    window.location.href = 'login.php';
  }

  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('open');
  }

  initData();
  loadSantriDropdown();
</script>
</body>
</html>