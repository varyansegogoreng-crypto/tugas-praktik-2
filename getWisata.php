<?php
$connect = mysqli_connect("localhost", "root", "", "json");
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);
$json_array = array();

while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}

header('Content-Type: application/json');
echo json_encode($json_array, JSON_PRETTY_PRINT);

mysqli_close($connect);
?>
