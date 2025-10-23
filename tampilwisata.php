<?php
// Lokasi file JSON
$file_path = __DIR__ . "/json/wisata.json";

// Cek apakah file JSON ada
if (!file_exists($file_path)) {
    die("File JSON tidak ditemukan. Pastikan getWisata.php sudah dijalankan.");
}

// Ambil isi file JSON
$jsonData = file_get_contents($file_path);

// Ubah JSON menjadi array PHP
$data = json_decode($jsonData, TRUE);

// Cek JSON valid
if($data === null){
    die("Gagal membaca data JSON. Periksa format JSON.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Daftar Wisata</h2>
    <div class="table-responsive">
        <table id="wisataTable" class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Wisata</th>
                    <th>Kota</th>
                    <th>Landmark</th>
                    <th>Tarif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_wisata']) ?></td>
                    <td><?= htmlspecialchars($row['kota']) ?></td>
                    <td><?= htmlspecialchars($row['landmark']) ?></td>
                    <td><?= htmlspecialchars($row['tarif']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#wisataTable').DataTable({
        "paging": true,       // Aktifkan paging
        "searching": true,    // Aktifkan search box
        "ordering": true,     // Aktifkan sorting
        "info": true          // Tampilkan info tabel
    });
});
</script>
</body>
</html>
