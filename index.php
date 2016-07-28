<?php
	require_once ('php/Mobile_Detect.php');

	$detect = new Mobile_Detect();

	if ($detect->isMobile()) {
		echo "<script>location.href='../movil-mimcontrol';</script>";
	}
	if ($detect->isTablet()) {
		echo "<script>location.href='../movil-mimcontrol';</script>";
	}
	if ($detect->isAndroidOS()) {
		echo "<script>location.href='../movil-mimcontrol';</script>";
	}
	if ($detect->isiOS()){
		echo "<script>location.href='../movil-mimcontrol';</script>";
	}

	else{
		echo "<script>location.href='index1.html';</script>";
	}
?>