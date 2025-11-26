<?php

/**
 * App helper
 */
defined('BASEPATH') OR exit('No direct script access allowed');

function looping_tanggal($starttime, $longtime)
{
	$end = date('Y-m-d', strtotime("+ ".$longtime." days", strtotime($starttime)));

	$minggu = checkSunday($starttime, $end);
	$finalend = date('Y-m-d', strtotime("+ $minggu days", strtotime($end)));
	$start = $starttime;

	$html = "";
	$i = 1;
	$interval = selisihHari($start, $end);
	while (strtotime($start) < strtotime($finalend)) {
		$hari = date('l', strtotime($start));

		if ($interval > 3) {
			$html .= "$i - $start ($hari)<br>";
			// simpan
			
		} else {
			if ($hari != 'Sunday') {
				$html .= "$i - $start ($hari)<br>";
				// simpan
			}
		}
		
		$start = date("Y-m-d", strtotime("+1 days", strtotime($start)));
		$i++;
	}
	return $html;
}

function checkSunday($start, $end)
{
	$minggu = 0;
	$interval = selisihHari($start, $end);
	while (strtotime($start) < strtotime($end)) {

		$hari = date('l', strtotime($start));
		if ($interval <= 3) {
			if ($hari == 'Sunday') {
				$minggu = $minggu + 1;
			}
		}

		$start = date("Y-m-d", strtotime("+1 days", strtotime($start)));
	}
	return $minggu;
}

function selisihHari($start, $end)
{
	$start_date = new DateTime($start);
	$end_date = new DateTime($end);
	$selesih = $start_date->diff($end_date);

	return $selesih->days;
}