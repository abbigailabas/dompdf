<?php 


$invoice = array( 
    'id' => '123456',
    'status' => 'PAID',
    'date' => '1476100800',
    'contact' => array(
        'first' => 'Jane',
        'last' => 'Doe',
        'email' => 'jane.doe@email.com'
    ),
    'address' => array(
        'street' => '12 Class St.',
        'province' => 'Ontario',
        'country' => 'Canada',
        'postal' => 'A1A1A1'
    ),
    'total' => 113.00,
    'tax' => 13.00,
    'shipping' => 10.00,
    'subtotal' => 90.00,
    //loop to go through cart
    'cart' => array(
        0 => array(
            'product' => 'Donec Luctus Diam',
            'price' => 25.00,
            'quantity' => 2,
            'total' => 50.00
        ),
        1 => array(
            'product' => 'Curabitur Aliquet Egestas',
            'price' => 10.00,
            'quantity' => 4,
            'total' => 40.00
        )    
    )
);



// ob = output buffer start
// ob_start();

ob_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dom PDF</title>
    

    <style>
        body {
            font-family: futura;
            width: 500px;
            margin: 0 auto;
            background-color: pink;
        }
        #title {
            width: 275px;
            margin: 0 auto;
        }
        h2 {
            margin: 0;
            padding: 0;
        }

        /*table styles*/
        td {
            width: 100px;
        }
    </style>


</head>
<body>
 	<div id="title">
	   <h1>PHP - Receipt PDF </h1>
	   <p>This is a PDF generated using PHP!</p>
	</div>
	
    <div>
    <!-- customer -->
        <h2>Customer</h2>
        Name: <?php echo $invoice['contact']['first']; ?>
        <?php echo $invoice['contact']['last']; ?>
        <br>
        Email: <?php echo $invoice['contact']['email']; ?>
	</div>

    <br>

    <div>
        <!-- adress -->
        <h2>Address</h2>
        Street: <?php echo $invoice['address']['street']; ?>
        <br>
        Province: <?php echo $invoice['address']['province']; ?>
        <br>
        Country: <?php echo $invoice['address']['country']; ?>
        <br>
        Postal Code: <?php echo $invoice['address']['postal']; ?>
    </div>

    <br>

    <div>
        <!-- cart information -->
        <h2>Cart information</h2>
        <?php foreach ($invoice['cart'] as $key => $value): ?>

        <table style="width:100%">

            <tr>
                <td>Product</td>
                <td><?php echo $value['product']; ?></td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td><?php echo $value['quantity']; ?></td>
            </tr>

            <tr>
                <td>Price</td>
                <td><?php echo number_format($value['price'],2); ?></td>
            </tr>

            <tr>
                <td>Total</td>
                <td><?php echo number_format($value['total'],2); ?></td>
            </tr>
            <tr>
                <td>
                    <p></p>
                </td>
            </tr>
        </table>

        <?php endforeach; ?> 
    </div>

    <br>

    <div>
        <!-- totals -->
        <h2>Total</h2>
        Total: <?php echo number_format($invoice['total'],2); ?>
        <br>
        Tax: <?php  echo number_format($invoice['tax'],2); ?>
        <br>
        Shipping: <?php echo number_format($invoice['shipping'],2); ?>
        <br>
        Subtotal: <?php echo number_format($invoice['subtotal'],2); ?>
    </div>
    <br>
    <div>
    <!-- Invoice id and stauts -->
        <b>Invoice ID:</b> <?php echo $invoice['id']; ?>
        <br>
        Status: <?php echo $invoice['status']; ?>
        <br>
        Date of purchase: <?php echo $invoice['date']; ?>
    </div>
</body>
</html>

<?php 

$html = ob_get_contents();
ob_end_clean();

// echo $html;

// echo $html;
// die();

require( 'dompdf-master/autoload.inc.php' );
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadhtml( $html );
$dompdf->render();
// (name of the pdf).pdf   so that it doesnt download right away
$dompdf->stream( "receipt", array('Attachment' => false) );
exit(0);

 ?>