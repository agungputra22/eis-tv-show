<?php

function generate_pdf($object, $filename='', $direct_download=TRUE, $paper_size='a4', $orientation='portrait')
{
	require_once("dompdf/dompdf_config.inc.php");
	//
	$dompdf = new DOMPDF();
	$dompdf->load_html($object);
	// THE FOLLOWING LINE OF CODE IS YOUR CONCERN
    $dompdf->set_paper($paper_size, $orientation);
	$dompdf->render();

	//
	if ($direct_download == TRUE)
	$dompdf->stream($filename, array('Attachment'=>0));
	else
	return $dompdf->output();
}

?>