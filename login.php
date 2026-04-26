<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Info Anak — Keuangan Santri</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --orange: #F97316; --orange-d: #C2560A; --orange-l: #FDBA74; --orange-xl: #FFF3E8;
    --green: #16A34A; --green-d: #14532D; --green-l: #86EFAC; --green-xl: #F0FDF4;
    --blue: #1D4ED8; --blue-m: #2563EB; --blue-l: #93C5FD; --blue-xl: #EFF6FF;
    --red: #DC2626; --red-xl: #FEF2F2; --red-l: #FECACA;
    --teal: #0891B2;
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

  /* ===== INFO LAYOUT ===== */
  .info-layout { display: grid; grid-template-columns: 340px 1fr; gap: 20px; align-items: start; }

  /* PROFILE CARD */
  .profile-card { background: var(--white); border-radius: 20px; border: 1.5px solid var(--gray-200); box-shadow: 0 1px 4px rgba(0,0,0,0.05); overflow: hidden; }
  .profile-banner { height: 90px; background: linear-gradient(135deg, #1E3A8A, #2563EB, #0891B2); position: relative; }
  .profile-banner::after { content: ''; position: absolute; bottom: -28px; left: 24px; width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, var(--orange), #EA580C); border: 3px solid var(--white); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(249,115,22,0.35); }
  .profile-avatar-wrap { position: relative; padding: 0 24px; margin-bottom: 0; }
  .profile-avatar {
    position: absolute; top: -28px; left: 24px;
    width: 56px; height: 56px; border-radius: 16px;
    background: linear-gradient(135deg, var(--orange), #EA580C);
    border: 3px solid var(--white);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 900; color: white;
    box-shadow: 0 4px 14px rgba(249,115,22,0.3);
    z-index: 1;
  }
  .profile-name-area { padding: 38px 24px 22px; }
  .profile-name { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 20px; font-weight: 800; color: var(--gray-900); }
  .profile-kelas { font-size: 13px; color: var(--blue-m); font-weight: 600; margin-top: 3px; }
  .profile-badges { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 12px; }
  .badge {
    font-size: 11px; font-weight: 700; padding: 4px 12px;
    border-radius: 20px; display: inline-flex; align-items: center; gap: 5px;
  }
  .badge svg { width: 12px; height: 12px; }
  .badge.green { background: var(--green-xl); color: var(--green-d); border: 1px solid var(--green-l); }
  .badge.blue { background: var(--blue-xl); color: var(--blue); border: 1px solid var(--blue-l); }
  .badge.orange { background: var(--orange-xl); color: var(--orange-d); border: 1px solid var(--orange-l); }

  .saldo-mini { margin: 0 24px 22px; padding: 14px 18px; background: linear-gradient(135deg, #1E3A8A, #2563EB); border-radius: 14px; }
  .saldo-mini-label { font-size: 11px; color: rgba(255,255,255,0.65); font-weight: 600; letter-spacing: 0.05em; margin-bottom: 4px; }
  .saldo-mini-val { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 24px; font-weight: 900; color: white; letter-spacing: -0.5px; }
  .saldo-mini-upd { font-size: 10px; color: rgba(255,255,255,0.5); margin-top: 3px; }

  /* DETAIL CARD */
  .detail-card { background: var(--white); border-radius: 20px; border: 1.5px solid var(--gray-200); box-shadow: 0 1px 4px rgba(0,0,0,0.05); overflow: hidden; }
  .card-section-head { padding: 16px 22px; border-bottom: 1px solid var(--gray-100); display: flex; align-items: center; gap: 10px; }
  .card-section-head .sec-icon { width: 34px; height: 34px; border-radius: 9px; display: flex; align-items: center; justify-content: center; }
  .sec-icon.o { background: var(--orange-xl); color: var(--orange); }
  .sec-icon.b { background: var(--blue-xl); color: var(--blue); }
  .sec-icon.g { background: var(--green-xl); color: var(--green); }
  .sec-icon svg { width: 17px; height: 17px; }
  .card-section-head h4 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 700; color: var(--gray-800); }
  .info-rows { padding: 6px 22px 18px; }
  .info-row { display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--gray-100); }
  .info-row:last-child { border-bottom: none; }
  .info-key { font-size: 13px; color: var(--gray-500); font-weight: 500; display: flex; align-items: center; gap: 8px; }
  .info-key svg { width: 14px; height: 14px; color: var(--gray-400); }
  .info-val { font-size: 13px; font-weight: 700; color: var(--gray-800); text-align: right; max-width: 55%; }
  .info-val.blue { color: var(--blue-m); font-size: 16px; font-family: 'Plus Jakarta Sans', sans-serif; }

  .prestasi-section { padding: 0 22px 20px; }
  .prestasi-item { display: flex; align-items: center; gap: 12px; padding: 12px 14px; background: var(--gray-50); border-radius: 12px; margin-bottom: 8px; border: 1px solid var(--gray-200); }
  .prst-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .prst-icon.gold { background: #FEF9C3; color: #854D0E; }
  .prst-icon.silver { background: #F1F5F9; color: #334155; }
  .prst-icon svg { width: 18px; height: 18px; }
  .prst-info { flex: 1; }
  .prst-name { font-size: 13px; font-weight: 600; color: var(--gray-800); }
  .prst-year { font-size: 11px; color: var(--gray-400); margin-top: 1px; }
  .prst-level { font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
  .prst-level.gold { background: #FEF9C3; color: #854D0E; }
  .prst-level.silver { background: #F1F5F9; color: #334155; }

  /* BOTTOM NAV */
  .bottom-nav { display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--white); border-top: 1px solid var(--gray-200); height: 64px; z-index: 300; box-shadow: 0 -4px 16px rgba(0,0,0,0.07); }
  .bnav-inner { display: flex; height: 100%; }
  .bnav-btn { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; cursor: pointer; color: var(--gray-400); text-decoration: none; transition: color 0.15s; }
  .bnav-btn.active { color: var(--orange); }
  .bnav-btn svg { width: 22px; height: 22px; }
  .bnav-btn span { font-size: 10px; font-weight: 600; }

  @media (max-width: 1000px) { .info-layout { grid-template-columns: 1fr; } }
  @media (max-width: 900px) { .sidebar { display: none; } .hamburger { display: flex; } .main { padding: 20px 16px 80px; } .bottom-nav { display: block; } .topbar-user .user-info { display: none; } .btn-logout { display: none; } }
  @media (max-width: 480px) { .topbar { padding: 0 16px; } }
  .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 250; }
  .sidebar-overlay.open { display: block; }
  .sidebar.open { display: flex !important; position: fixed; top: 62px; left: 0; bottom: 0; z-index: 260; width: var(--sidebar-w); }
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
    <button class="btn-logout" onclick="window.location.href='login.html'">Keluar</button>
  </div>
</header>

<div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="app-wrap">
  <nav class="sidebar" id="sidebar">
    <div class="nav-section-label">Menu Utama</div>
    <a class="nav-item" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>Beranda</a>
    <a class="nav-item" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg>Transfer Saldo</a>
    <a class="nav-item" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>Riwayat</a>
    <a class="nav-item active" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>Info Anak</a>
    <div class="sidebar-divider"></div>
    <div class="sidebar-footer"><p>Versi 1.0.0</p><strong>Sekolah Impian</strong></div>
  </nav>

  <main class="main">
    <div class="page-head">
      <h1>Info Anak</h1>
      <p>Data lengkap profil dan informasi santri Anda</p>
    </div>

    <div class="info-layout">

      <!-- PROFILE CARD -->
      <div>
        <div class="profile-card">
          <div class="profile-banner"></div>
          <div style="position: relative; height: 0;">
            <div class="profile-avatar">AF</div>
          </div>
          <div class="profile-name-area">
            <h2 class="profile-name">Ahmad Fauzi</h2>
            <p class="profile-kelas">Kelas 10 · Pondok Putra</p>
            <div class="profile-badges">
              <span class="badge green">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                Aktif
              </span>
              <span class="badge blue">Tahun ke-2</span>
              <span class="badge orange">Pondok Putra A</span>
            </div>
          </div>
          <div class="saldo-mini">
            <p class="saldo-mini-label">SALDO TERSEDIA</p>
            <p class="saldo-mini-val" id="saldoMiniVal">Rp 250.000</p>
            <p class="saldo-mini-upd">Update: <span id="saldoUpdate">12 Mei 2025 · 10:30</span></p>
          </div>
        </div>
      </div>

      <!-- DETAIL CARDS -->
      <div style="display: flex; flex-direction: column; gap: 16px;">

        <!-- DATA DIRI -->
        <div class="detail-card">
          <div class="card-section-head">
            <div class="sec-icon o"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg></div>
            <h4>Data Diri Santri</h4>
          </div>
          <div class="info-rows">
            <div class="info-row">
              <span class="info-key"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg>NIS</span>
              <span class="info-val">20250041</span>
            </div>
            <div class="info-row">
              <span class="info-key"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>Tempat Lahir</span>
              <span class="info-val">Depok, Jawa Barat</span>
            </div>
            <div class="info-row">
              <span class="info-key"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>Tanggal Lahir</span>
              <span class="info-val">14 Maret 2009</span>
            </div>
            <div class="info-row">
              <span class="info-key"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Jenis Kelamin</span>
              <span class="info-val">Laki-laki</span>
            </div>
            <div class="info-row">
              <span class="info-key"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>Tahun Masuk</span>
              <span class="info-val">2024</span>
            </div>
          </div>
        </div>

        <!-- INFO ASRAMA -->
        <div class="detail-card">
          <div class="card-section-head">
            <div class="sec-icon b"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg></div>
            <h4>Info Asrama & Akademik</h4>
          </div>
          <div class="info-rows">
            <div class="info-row">
              <span class="info-key">Asrama</span>
              <span class="info-val">Pondok Putra A</span>
            </div>
            <div class="info-row">
              <span class="info-key">Nomor Kamar</span>
              <span class="info-val">Kamar 07</span>
            </div>
            <div class="info-row">
              <span class="info-key">Pembimbing / Musyrif</span>
              <span class="info-val">Ust. Hendra, S.Pd</span>
            </div>
            <div class="info-row">
              <span class="info-key">Wali Kelas</span>
              <span class="info-val">Bu Rahmah, M.Pd</span>
            </div>
            <div class="info-row">
              <span class="info-key">Jurusan</span>
              <span class="info-val">IPA (Sains)</span>
            </div>
            <div class="info-row">
              <span class="info-key">Status</span>
              <span class="badge green" style="font-size:12px;">
                <svg viewBox="0 0 24 24" fill="currentColor" width="12" height="12"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                Aktif
              </span>
            </div>
          </div>
        </div>

        <!-- DATA WALI -->
        <div class="detail-card">
          <div class="card-section-head">
            <div class="sec-icon g"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg></div>
            <h4>Data Wali Santri</h4>
          </div>
          <div class="info-rows">
            <div class="info-row">
              <span class="info-key">Nama Wali</span>
              <span class="info-val">Bpk. Haris Maulana</span>
            </div>
            <div class="info-row">
              <span class="info-key">Hubungan</span>
              <span class="info-val">Ayah Kandung</span>
            </div>
            <div class="info-row">
              <span class="info-key">No. Telepon</span>
              <span class="info-val" style="color: var(--blue-m);">0812-3456-7890</span>
            </div>
            <div class="info-row">
              <span class="info-key">Email</span>
              <span class="info-val" style="color: var(--blue-m); font-size: 12px;">haris.maulana@gmail.com</span>
            </div>
            <div class="info-row">
              <span class="info-key">Alamat</span>
              <span class="info-val" style="font-size: 12px;">Jl. Cempaka No. 12, Depok</span>
            </div>
          </div>
        </div>

        <!-- PRESTASI -->
        <div class="detail-card">
          <div class="card-section-head">
            <div class="sec-icon o"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 4l5 2.18V11c0 3.5-2.33 6.79-5 7.93-2.67-1.14-5-4.43-5-7.93V7.18L12 5z"/></svg></div>
            <h4>Prestasi & Catatan</h4>
          </div>
          <div class="prestasi-section">
            <div class="prestasi-item">
              <div class="prst-icon gold"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
              <div class="prst-info"><p class="prst-name">Juara 1 MTQ Tingkat Kecamatan</p><p class="prst-year">April 2025</p></div>
              <span class="prst-level gold">Juara 1</span>
            </div>
            <div class="prestasi-item">
              <div class="prst-icon silver"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
              <div class="prst-info"><p class="prst-name">Santri Terdisiplin Semester 1</p><p class="prst-year">Desember 2024</p></div>
              <span class="prst-level silver">Terpilih</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<!-- BOTTOM NAV -->
<nav class="bottom-nav">
  <div class="bnav-inner">
    <a class="bnav-btn" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg><span>Beranda</span></a>
    <a class="bnav-btn" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg><span>Transfer</span></a>
    <a class="bnav-btn" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg><span>Riwayat</span></a>
    <a class="bnav-btn active" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg><span>Info Anak</span></a>
  </div>
</nav>

<script>
  function getData() { return JSON.parse(localStorage.getItem('keuanganSantri_data')); }

  function loadSantriInfo() {
    const data = getData();
    if (!data) return;
    const currentSantri = data.santriList.find(s => s.id === data.currentSantriId);
    if (!currentSantri) return;

    // Update saldo
    document.getElementById('saldoMiniVal').innerText = `Rp ${currentSantri.saldo.toLocaleString('id-ID')}`;
    document.getElementById('saldoUpdate').innerText = new Date().toLocaleDateString('id-ID') + ' · ' + new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});

    // Update nama dan avatar jika perlu
    document.querySelector('.profile-name').innerText = currentSantri.name;
    document.querySelector('.profile-avatar').innerText = currentSantri.avatar;
    document.querySelector('.profile-kelas').innerText = currentSantri.kelas;
  }

  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('open');
  }

  // Load data saat halaman dimuat
  loadSantriInfo();
</script>
</body>
</html>
