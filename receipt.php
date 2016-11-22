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

?>