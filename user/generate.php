<?php

ob_start();
require_once 'template.php';
$template = ob_get_clean();

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($template);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

@mkdir('../pdfs');
$file = 'message-'.time().'.pdf';
file_put_contents('../pdfs/'.$file, $dompdf->output());
$dompdf->stream($file);
header("Location: cart.php");

?> 
