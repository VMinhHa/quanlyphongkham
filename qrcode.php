<?php

    include('plugins/phpqrcode/qrlib.php');
    
    $id = $_GET['id'];
    $patch = 'images/qrcode/';
    $file = $patch.uniqid().".png";
    // outputs image directly into browser, as PNG stream
    $text= "Hello dsaaaaaaaa";

    QRcode::png($text, $file, QR_ECLEVEL_L, 4);

    echo "<center><img src='".$file."'></center>";

?>