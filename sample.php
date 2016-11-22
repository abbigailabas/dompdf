<?php 


// ob = output buffer start
// ob_start();

ob_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dom PDF</title>
</head>
<body>
 	
	<h1>Sample</h1>
	<p>this is a PDF generated using PHP!</p>
	
	

</body>
</html>

<?php 

$html = ob_get_contents();
ob_end_clean();

// echo $html;

require( 'dompdf-master/autoload.inc.php' );
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadhtml( $html );
$dompdf->render();
// (name of the pdf).pdf   so that it doesnt download right away
$dompdf->stream( "receipt", array('Attachment' => false) );
exit(0);

 ?>