<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Transaksi — Keuangan Santri</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
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

  .santri-selector { margin-bottom: 20px; display: flex; justify-content: flex-end; }
  .santri-dropdown { padding: 8px 16px; border-radius: 20px; border: 1.5px solid var(--gray-200); background: var(--white); font-weight: 600; font-size: 13px; color: var(--gray-700); cursor: pointer; outline: none; }

  .mini-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 20px; }
  .mini-stat { background: var(--white); border-radius: 14px; border: 1.5px solid var(--gray-200); padding: 16px 18px; box-shadow: 0 1px 4px rgba(0,0,0,0.04); }
  .ms-label { font-size: 11px; font-weight: 600; color: var(--gray-500); letter-spacing: 0.03em; margin-bottom: 6px; }
  .ms-val { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 20px; font-weight: 800; }
  .ms-val.blue { color: var(--blue-m); }
  .ms-val.green { color: var(--green); }
  .ms-val.red { color: var(--red); }

  .filter-bar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; flex-wrap: wrap; gap: 10px; }
  .filter-tabs { display: flex; gap: 6px; background: var(--white); padding: 5px; border-radius: 12px; border: 1.5px solid var(--gray-200); box-shadow: 0 1px 3px rgba(0,0,0,0.04); }
  .ftab { padding: 8px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; color: var(--gray-500); transition: all 0.15s; }
  .ftab.active { background: var(--orange); color: white; }
  .ftab:not(.active):hover { background: var(--gray-100); color: var(--gray-700); }
  .filter-right { display: flex; gap: 8px; align-items: center; }
  .filter-select { padding: 9px 14px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-size: 13px; font-weight: 600; color: var(--gray-700); background: var(--white); cursor: pointer; outline: none; font-family: 'DM Sans', sans-serif; transition: border-color 0.15s; }
  .filter-select:focus { border-color: var(--orange); }

  .card-box { background: var(--white); border-radius: 18px; border: 1.5px solid var(--gray-200); box-shadow: 0 1px 4px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 16px; }
  .month-header { padding: 12px 22px; background: var(--gray-50); border-bottom: 1px solid var(--gray-100); display: flex; align-items: center; justify-content: space-between; }
  .month-label { font-size: 12px; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.06em; }
  .month-total { font-size: 12px; font-weight: 600; color: var(--gray-500); }
  .tx-item { display: flex; align-items: center; gap: 14px; padding: 15px 22px; border-bottom: 1px solid var(--gray-100); cursor: pointer; transition: background 0.12s; }
  .tx-item:last-child { border-bottom: none; }
  .tx-item:hover { background: var(--gray-50); }
  .tx-ico { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .tx-ico.out { background: var(--red-xl); color: var(--red); }
  .tx-ico.in  { background: var(--green-xl); color: var(--green); }
  .tx-ico svg { width: 19px; height: 19px; }
  .tx-info { flex: 1; min-width: 0; }
  .tx-name { font-size: 14px; font-weight: 600; color: var(--gray-800); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .tx-date { font-size: 11px; color: var(--gray-400); margin-top: 2px; }
  .tx-right { text-align: right; flex-shrink: 0; }
  .tx-amount { font-size: 14px; font-weight: 700; }
  .tx-amount.out { color: var(--red); }
  .tx-amount.in  { color: var(--green); }
  .tx-cat { font-size: 10px; color: var(--gray-400); margin-top: 2px; font-weight: 600; letter-spacing: 0.03em; text-transform: uppercase; }

  .empty-state { padding: 60px 20px; text-align: center; }
  .empty-state svg { width: 56px; height: 56px; color: var(--gray-300); margin-bottom: 12px; }
  .empty-state p { font-size: 15px; font-weight: 600; color: var(--gray-400); }

  .bottom-nav { display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--white); border-top: 1px solid var(--gray-200); height: 64px; z-index: 300; box-shadow: 0 -4px 16px rgba(0,0,0,0.07); }
  .bnav-inner { display: flex; height: 100%; }
  .bnav-btn { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; cursor: pointer; color: var(--gray-400); text-decoration: none; transition: color 0.15s; }
  .bnav-btn.active { color: var(--orange); }
  .bnav-btn svg { width: 22px; height: 22px; }
  .bnav-btn span { font-size: 10px; font-weight: 600; }

  @media (max-width: 900px) { .sidebar { display: none; } .hamburger { display: flex; } .main { padding: 20px 16px 80px; } .bottom-nav { display: block; } .topbar-user .user-info { display: none; } .btn-logout { display: none; } .mini-stats { grid-template-columns: 1fr 1fr; } .mini-stats .mini-stat:last-child { grid-column: 1 / -1; } }
  @media (max-width: 480px) { .topbar { padding: 0 16px; } .filter-bar { flex-direction: column; align-items: flex-start; } .mini-stats { grid-template-columns: 1fr 1fr; } }
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
    <button class="btn-logout" onclick="logout()">Keluar</button>
  </div>
</header>

<div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="app-wrap">
  <nav class="sidebar" id="sidebar">
    <div class="nav-section-label">Menu Utama</div>
    <a class="nav-item" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>Beranda</a>
    <a class="nav-item" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg>Transfer Saldo</a>
    <a class="nav-item active" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>Riwayat</a>
    <a class="nav-item" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>Info Anak</a>
    <div class="sidebar-divider"></div>
    <div class="sidebar-footer"><p>Versi 1.0.0</p><strong>Sekolah Impian</strong></div>
  </nav>

  <main class="main">
    <div class="page-head">
      <h1>Riwayat Transaksi</h1>
      <p id="santriInfo">Memuat data...</p>
    </div>

    <div class="santri-selector">
      <select id="santriSelect" class="santri-dropdown" onchange="gantiSantri()"></select>
    </div>

    <!-- MINI STATS -->
    <div class="mini-stats" id="miniStats"></div>

    <!-- FILTER BAR -->
    <div class="filter-bar">
      <div class="filter-tabs">
        <div class="ftab active" data-filter="semua" onclick="setFilter('semua',this)">Semua</div>
        <div class="ftab" data-filter="masuk" onclick="setFilter('masuk',this)">Pemasukan</div>
        <div class="ftab" data-filter="keluar" onclick="setFilter('keluar',this)">Pengeluaran</div>
      </div>
      <div class="filter-right">
        <select id="bulanSelect" class="filter-select" onchange="setBulan(this.value)">
          <option value="semua">Semua Bulan</option>
        </select>
      </div>
    </div>

    <div id="txContainer"></div>
  </main>
</div>

<nav class="bottom-nav">
  <div class="bnav-inner">
    <a class="bnav-btn" href="beranda.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg><span>Beranda</span></a>
    <a class="bnav-btn" href="transfer.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/></svg><span>Transfer</span></a>
    <a class="bnav-btn active" href="riwayat.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg><span>Riwayat</span></a>
    <a class="bnav-btn" href="infoanak.php"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg><span>Info Anak</span></a>
  </div>
</nav>

<script>
  // Data awal jika belum ada
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
  let currentFilter = 'semua';
  let currentBulan = 'semua';

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
    document.getElementById('santriInfo').innerHTML = `${currentSantri.name} · ${currentSantri.kelas}`;
    // populate bulan dropdown dari riwayat
    const bulanSet = new Set();
    currentSantri.riwayat.forEach(tx => {
      const bulan = tx.tanggal.split(' · ')[0]; // misal "12 Mei 2025"
      bulanSet.add(bulan);
    });
    const bulanSelect = document.getElementById('bulanSelect');
    bulanSelect.innerHTML = '<option value="semua">Semua Bulan</option>';
    Array.from(bulanSet).sort().reverse().forEach(b => {
      const opt = document.createElement('option');
      opt.value = b;
      opt.textContent = b;
      bulanSelect.appendChild(opt);
    });
    renderRiwayat();
  }

  function gantiSantri() {
    const select = document.getElementById('santriSelect');
    const newId = select.value;
    const data = getData();
    data.currentSantriId = newId;
    saveData(data);
    currentSantri = data.santriList.find(s => s.id === newId);
    document.getElementById('santriInfo').innerHTML = `${currentSantri.name} · ${currentSantri.kelas}`;
    // refresh bulan dropdown
    const bulanSet = new Set();
    currentSantri.riwayat.forEach(tx => {
      const bulan = tx.tanggal.split(' · ')[0];
      bulanSet.add(bulan);
    });
    const bulanSelect = document.getElementById('bulanSelect');
    bulanSelect.innerHTML = '<option value="semua">Semua Bulan</option>';
    Array.from(bulanSet).sort().reverse().forEach(b => {
      const opt = document.createElement('option');
      opt.value = b;
      opt.textContent = b;
      bulanSelect.appendChild(opt);
    });
    currentFilter = 'semua';
    currentBulan = 'semua';
    document.querySelectorAll('.ftab').forEach(t => t.classList.remove('active'));
    document.querySelector('.ftab[data-filter="semua"]').classList.add('active');
    document.getElementById('bulanSelect').value = 'semua';
    renderRiwayat();
  }

  function setFilter(filter, el) {
    currentFilter = filter;
    document.querySelectorAll('.ftab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    renderRiwayat();
  }

  function setBulan(bulan) {
    currentBulan = bulan;
    renderRiwayat();
  }

  function renderRiwayat() {
    if (!currentSantri) return;
    // Hitung mini stats
    const saldo = currentSantri.saldo;
    let totalMasuk = 0, totalKeluar = 0;
    const bulanIni = new Date().toLocaleDateString('id-ID', { month: 'long', year: 'numeric' }).replace(' ', ' '); // misal "Mei 2025"
    currentSantri.riwayat.forEach(tx => {
      const txBulan = tx.tanggal.split(' · ')[0];
      if (txBulan === bulanIni) {
        if (tx.type === 'masuk') totalMasuk += tx.amount;
        else totalKeluar += tx.amount;
      }
    });
    document.getElementById('miniStats').innerHTML = `
      <div class="mini-stat"><p class="ms-label">SALDO SAAT INI</p><p class="ms-val blue">Rp ${saldo.toLocaleString('id-ID')}</p></div>
      <div class="mini-stat"><p class="ms-label">TOTAL MASUK (${bulanIni})</p><p class="ms-val green">Rp ${totalMasuk.toLocaleString('id-ID')}</p></div>
      <div class="mini-stat"><p class="ms-label">TOTAL KELUAR (${bulanIni})</p><p class="ms-val red">Rp ${totalKeluar.toLocaleString('id-ID')}</p></div>
    `;

    // Filter riwayat
    let filtered = [...currentSantri.riwayat];
    if (currentFilter !== 'semua') {
      filtered = filtered.filter(tx => tx.type === currentFilter);
    }
    if (currentBulan !== 'semua') {
      filtered = filtered.filter(tx => tx.tanggal.split(' · ')[0] === currentBulan);
    }
    // Kelompokkan berdasarkan bulan
    const grouped = {};
    filtered.forEach(tx => {
      const bulan = tx.tanggal.split(' · ')[0];
      if (!grouped[bulan]) grouped[bulan] = [];
      grouped[bulan].push(tx);
    });
    const container = document.getElementById('txContainer');
    if (Object.keys(grouped).length === 0) {
      container.innerHTML = `<div class="empty-state"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg><p>Tidak ada transaksi</p></div>`;
      return;
    }
    container.innerHTML = '';
    for (const [bulan, txList] of Object.entries(grouped)) {
      const card = document.createElement('div');
      card.className = 'card-box';
      card.innerHTML = `<div class="month-header"><span class="month-label">${bulan}</span><span class="month-total">${txList.length} transaksi</span></div>`;
      const body = document.createElement('div');
      txList.forEach(tx => {
        const item = document.createElement('div');
        item.className = 'tx-item';
        item.setAttribute('data-type', tx.type);
        const iconPath = tx.type === 'masuk' 
          ? '<path d="M7 16l-4-4 4-4v3h6v2H7v3zM17 8l4 4-4 4v-3h-6v-2h6V8z"/>'
          : '<path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2-2.76 5H8.53l-.13-.27L6.16 6l-.95-2-.94-2H1v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/>';
        item.innerHTML = `
          <div class="tx-ico ${tx.type === 'masuk' ? 'in' : 'out'}"><svg viewBox="0 0 24 24" fill="currentColor">${iconPath}</svg></div>
          <div class="tx-info"><p class="tx-name">${tx.nama}</p><p class="tx-date">${tx.tanggal}</p></div>
          <div class="tx-right"><p class="tx-amount ${tx.type === 'masuk' ? 'in' : 'out'}">${tx.type === 'masuk' ? '+' : '-'} Rp ${tx.amount.toLocaleString('id-ID')}</p><p class="tx-cat">${tx.kategori}</p></div>
        `;
        body.appendChild(item);
      });
      card.appendChild(body);
      container.appendChild(card);
    }
  }

  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('overlay').classList.toggle('open');
  }

  function logout() {
    localStorage.removeItem('keuanganSantri_user');
    window.location.href = 'login.php';
  }

  initData();
  loadSantriDropdown();
</script>
</body>
</html>