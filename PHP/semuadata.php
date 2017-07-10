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

// query menampilkan semua data data
$result = mysql_query("SELECT *FROM data") or die(mysql_error());

// jika data ada/tidak kosong
if (mysql_num_rows($result) > 0) {
    // looping semua hasil
    // data node
    $respon["data"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp data array
        $data = array();
        $data["id"] = $row["id"];
        $data["nama"] = $row["nama"];
        $data["keterangan"] = $row["keterangan"];
		$data["kategori"] = $row["kategori"];
		$data["longitude"] = $row["longitude"];
		$data["latitude"] = $row["latitude"];
        
       //tambahkan array $data pada array final $respon
        array_push($respon["data"], $data);
    }
    // sukses
    $respon["sukses"] = 1;

    // memprint/mencetak JSON respon
    echo json_encode($respon);
} else {
    // jika data kosong
    $respon["sukses"] = 0;
    $respon["pesan"] = "Tidak ada data";

    // memprint/mencetak JSON respon
    echo json_encode($respon);
}
?>
