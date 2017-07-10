<?php
error_reporting(E_ALL ^ E_DEPRECATED);

//koneksi database mysql
$dbhost = "localhost";
$dbuser	= "root";
$dbpass	= "";
$dbname	= "uas";
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

//buat array untuk menampung respon dari JSON
$respon = array();

// cek apakah nilai yang dikirimkan android sudah terisi
if (isset($_POST['nama']) && isset($_POST['keterangan']) && isset($_POST['kategori']) && isset($_POST['longitude']) && isset($_POST['latitude'])) {
    
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
	$kategori  = $_POST['kategori'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];

      // query menambah data data
    $result = mysql_query("INSERT INTO data(nama, keterangan, kategori, longitude, latitude) VALUES('$nama', '$keterangan', '$kategori', '$longitude', '$latitude')");

    // cek apakah query berhasil menambah data
    if ($result) {
        // jika berhasil menambah data ke mysql
        $respon["sukses"] = 1;
        $respon["pesan"] = "Berhasil menambah data data.";

        // memprint/mencetak JSON respon
        echo json_encode($respon);
    } else {
        // gagal menambah data data
        $respon["sukses"] = 0;
        $respon["pesan"] = "Gagal menambah data.";
        
        // memprint/mencetak JSON respon
        echo json_encode($respon);
    }
} else {
    // jika data tidak terisi/tidak terset
    $respon["sukses"] = 0;
    $respon["pesan"] = "data belum terisi";

    //  memprint/mencetak JSON respon
    echo json_encode($respon);
}
?>