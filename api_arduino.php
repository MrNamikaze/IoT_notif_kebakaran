<?php
define('BOT_TOKEN', '5206391012:AAGhBmTLsoxhrONcAMZUIIstkLCvTffSamw');
define('CHAT_ID','-799633440');
require_once("koneksi.php");
$id = $_GET['id'];
$data = explode(" ",$id);
$gas_sensor = $data[2];
$flame_sensor = $data[3];
$suhu_sensor = $data[4];
$ruangan = $data[0];
$status = $data[1];

if($ruangan == 1){
	$nama_ruangan = "Satu";
}
else if($ruangan == 2){
	$nama_ruangan = "Dua";
}
else if($ruangan == 3){
	$nama_ruangan = "Tiga";
}
else if($ruangan == 4){
	$nama_ruangan = "Empat";
}
if($status == 1){
	$data1[] = $ruangan;
	$sql = "UPDATE ruangan SET kondisi=1 WHERE id=?";
	$stmt = $db->prepare($sql);

	// eksekusi query untuk menyimpan ke database
	$saved = $stmt->execute($data1);
  	//
  	$sql1 = "INSERT INTO arduino (ruangan, gas_sensor, flame_sensor, suhu_sensor) 
	                VALUES (:ruangan, :gas_sensor, :flame_sensor, :suhu_sensor)";
	$stmt1 = $db->prepare($sql1);
	// bind parameter ke query
	$params = array(
		":ruangan" => $ruangan,
	    ":gas_sensor" => $gas_sensor,
	    ":flame_sensor" => $flame_sensor,
	    ":suhu_sensor" => $suhu_sensor,
	);

	// eksekusi query untuk menyimpan ke database
	$saved = $stmt1->execute($params);
}
else{
	$sql = "UPDATE ruangan SET kondisi= $status WHERE id=$ruangan";
	$stmt = $db->prepare($sql);
	// eksekusi query untuk menyimpan ke database
	$saved = $stmt->execute();

	$sql1 = "INSERT INTO arduino (ruangan, gas_sensor, flame_sensor, suhu_sensor) 
	                VALUES (:ruangan, :gas_sensor, :flame_sensor, :suhu_sensor)";
	$stmt1 = $db->prepare($sql1);
	// bind parameter ke query
	$params = array(
		":ruangan" => $ruangan,
	    ":gas_sensor" => $gas_sensor,
	    ":flame_sensor" => $flame_sensor,
	    ":suhu_sensor" => $suhu_sensor,
	);

	// eksekusi query untuk menyimpan ke database
	$saved = $stmt1->execute($params);

	if($status == 2){
		function kirimTelegram($pesan) {
		    $pesan = json_encode($pesan);
		    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendMessage?chat_id=".CHAT_ID."&text=$pesan";
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		    curl_setopt($ch, CURLOPT_URL, $API);
		    $result = curl_exec($ch);
		    curl_close($ch);
		    return $result;
		}
		 
		kirimTelegram("Peringatan Kebakaran Pada Gedung $nama_ruangan");
	}
	else if($status == 3){
		function kirimTelegram($pesan) {
		    $pesan = json_encode($pesan);
		    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendMessage?chat_id=".CHAT_ID."&text=$pesan";
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		    curl_setopt($ch, CURLOPT_URL, $API);
		    $result = curl_exec($ch);
		    curl_close($ch);
		    return $result;
		}
		 
		kirimTelegram("Peringatan Kebakaran Pada Gedung $nama_ruangan");
	}
	else if($status == 4){
		function kirimTelegram($pesan) {
		    $pesan = json_encode($pesan);
		    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendMessage?chat_id=".CHAT_ID."&text=$pesan";
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		    curl_setopt($ch, CURLOPT_URL, $API);
		    $result = curl_exec($ch);
		    curl_close($ch);
		    return $result;
		}
		 
		kirimTelegram("Peringatan Kebakaran Pada Gedung $nama_ruangan");
	}
}





?>