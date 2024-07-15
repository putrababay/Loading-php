<style>
	#progress {
		overflow: hidden;
	}

	#progress .progress-bar {
		background: #337ab7;
		padding: 5px;
		overflow: hidden;
		text-align: center;
		color: #fff;
		font-size: 14px;
		font-family: Arial;
		max-height: 20px;
		overflow: hidden;
	}
</style>
<!-- Progress bar holder -->
<div id="progress" style="width:100%;"></div>
<?php
//ini_set('max_execution_time', 1000);
$awal = microtime(true);
$total = 10;
for ($i = 1; $i <= $total; $i++) {
	// Calculate the percentation
	$percent = intval($i / $total * 100) . "%";
	// Javascript for updating the progress bar and information
	echo '<script language="javascript">
	document.getElementById("progress").innerHTML="<br><br><br><div class=\"progress progress-striped active\"><div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ' . $percent . '\">' . $percent . ' Complete</div></div>";
	</script>';
	// This is for the buffer achieve the minimum size in order to flush data
	echo str_repeat(' ', 1024 * 64);
	// Send output to browser immediately
	flush();
	// Sleep one second so we can see the delay
	sleep(1);
	//$i++;
}

// Tell user that the process is completed
echo '<script language="javascript">document.getElementById("progress").style.display="none";</script>';
$akhir = microtime(true);
$lama = $akhir - $awal;
echo "<div class='alert alert-info col-md-12' style='clear:both;text-align:center;position:fixed;top:60px;left:0px;'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		Proses selesai.<br>Jumlah baris yang di proses " . ($i - 1) . ". Lama eksekusi script: " . $lama . " detik
	</div>";
?>
