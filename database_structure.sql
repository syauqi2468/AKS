// data.js - Pusat manajemen data santri

// Inisialisasi data default jika belum ada
function initData() {
    if (!localStorage.getItem('saldoSantri')) {
        localStorage.setItem('saldoSantri', '250000');
    }
    if (!localStorage.getItem('riwayatTransaksi')) {
        const defaultRiwayat = [
            { id: Date.now(), tgl: '2025-05-12T10:30', jenis: 'keluar', nominal: 15000, deskripsi: 'Jajan Kantin', kategori: 'Konsumsi' },
            { id: Date.now()+1, tgl: '2025-05-10T08:15', jenis: 'masuk', nominal: 200000, deskripsi: 'Transfer dari Wali', kategori: 'Transfer Masuk' },
            { id: Date.now()+2, tgl: '2025-05-08T12:00', jenis: 'keluar', nominal: 5000, deskripsi: 'Fotocopy', kategori: 'Keperluan' },
            { id: Date.now()+3, tgl: '2025-05-05T09:40', jenis: 'keluar', nominal: 30000, deskripsi: 'Belanja ATK', kategori: 'Perlengkapan' },
            { id: Date.now()+4, tgl: '2025-05-01T07:00', jenis: 'masuk', nominal: 300000, deskripsi: 'Transfer dari Wali', kategori: 'Transfer Masuk' },
            { id: Date.now()+5, tgl: '2025-04-28T09:00', jenis: 'masuk', nominal: 300000, deskripsi: 'Transfer dari Wali', kategori: 'Transfer Masuk' },
            { id: Date.now()+6, tgl: '2025-04-25T11:00', jenis: 'keluar', nominal: 20000, deskripsi: 'Jajan Kantin', kategori: 'Konsumsi' },
            { id: Date.now()+7, tgl: '2025-04-20T14:15', jenis: 'keluar', nominal: 45000, deskripsi: 'Buku Pelajaran', kategori: 'Pendidikan' },
            { id: Date.now()+8, tgl: '2025-04-15T08:30', jenis: 'keluar', nominal: 25000, deskripsi: 'Laundry', kategori: 'Kebersihan' }
        ];
        localStorage.setItem('riwayatTransaksi', JSON.stringify(defaultRiwayat));
    }
}

// Ambil saldo saat ini
function getSaldo() {
    return parseInt(localStorage.getItem('saldoSantri')) || 0;
}

// Set saldo (pastikan tidak negatif)
function setSaldo(nominal) {
    localStorage.setItem('saldoSantri', Math.max(0, nominal).toString());
}

// Tambah transaksi baru
function tambahTransaksi(jenis, nominal, deskripsi, kategori) {
    const riwayat = JSON.parse(localStorage.getItem('riwayatTransaksi')) || [];
    const newTx = {
        id: Date.now(),
        tgl: new Date().toISOString(),
        jenis: jenis,   // 'masuk' atau 'keluar'
        nominal: nominal,
        deskripsi: deskripsi,
        kategori: kategori
    };
    riwayat.unshift(newTx); // tambah di awal
    localStorage.setItem('riwayatTransaksi', JSON.stringify(riwayat));
}

// Ambil semua riwayat
function getRiwayat() {
    return JSON.parse(localStorage.getItem('riwayatTransaksi')) || [];
}

// Format Rupiah
function formatRupiah(nominal) {
    return 'Rp ' + nominal.toLocaleString('id-ID');
}

// Panggil initData saat pertama kali load
initData();