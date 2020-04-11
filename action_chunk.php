<?php
$string = $_SERVER['QUERY_STRING']; 
        // Cálculo del dígito de control EAN
function ean13_checksum ($message) {
  $checksum = 0;
  foreach (str_split(strrev($message)) as $pos => $val) {
    $checksum += $val * (3 - 2 * ($pos % 2));
  }
  return ((10 - ($checksum % 10)) % 10);
}

$pais = $_POST['pais'];
$empresa = $_POST['empresa'];
$producto = $_POST['producto'];

?>

<html>
  <h1><?php echo 'Digito de control: ', ean13_checksum($pais.$empresa.$producto); ?></h1>
  <h2><?php echo 'Número enviado: ' , $pais.$empresa.$producto ?></h2>
</html>
