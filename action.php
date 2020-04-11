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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EAN-13 Code Generator</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.center {
  text-align: center;
}
</style>
</head>
<body>


	<div class="container-contact100">

		<div class="wrap-contact100 center">
			<h2>El código es:</h2>
      </br>
      <h1><?php echo $pais.$empresa.$producto ?>
      <strong><?php echo ' + ', ean13_checksum($pais.$empresa.$producto); ?></strong></h1>
      </br>
      <img src="https://ean.covid-map.info/example/html/image.php?filetype=PNG&dpi=300&scale=3&rotation=0&font_family=Arial.ttf&font_size=26&text=<?php echo $pais.$empresa.$producto ?><?php echo ean13_checksum($pais.$empresa.$producto); ?>&thickness=30&code=BCGean13" alt="Código de barras">
      </br>
      </br>
      <div class="container-contact100-form-btn">
					<button onclick="goBack()" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Repetir
						</span>
					</button>
				</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script>
  function goBack() {
    window.history.back();
  }
</script>


</body>
</html>
