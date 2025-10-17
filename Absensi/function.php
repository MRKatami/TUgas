<?php
$conn = mysqli_connect("localhost", "root", "", "absensi");

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Untuk menambahkan absensi
if (isset($_POST["submit"])) {
    $NPM = $_POST["NPM"];
    $nama = $_POST["Nama"];
    $matkul = $_POST["Matkul"];
    $keterangan = $_POST["Keterangan"];

    // untuk menambahkan data
    $addtotable = mysqli_query($conn, 
        "INSERT INTO kehadiran (NPM, Nama, `Mata Kuliah`, Keterangan) 
         VALUES ('$NPM', '$nama', '$matkul', '$keterangan')"
    );

    // Cek apakah query berhasil
    if ($addtotable) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>
