<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$cliente = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  //verifica o campo telefone-------------------------------------------
  if (empty($_POST["cliente"])) 
  {
    consultaPedidos($cliente);
  } 
  else 
  {
    $$cliente = test_input($_POST["cliente"]);
	if (!preg_match("/^[0-9 ]*$/",$cliente)) 
	{
      $pedidoErr = "São permitidos somente números";
    }
	else
	{
		consultaPedidos($cliente);
	}
  }
}
//verifica se nao há um codigo malicioso nos dados-----------------------------
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
		
    <h1> Consulta de Pedidos </h1>
	
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		ID do Cliente: <input type="number" name="$cliente" value="<?php echo $$cliente;?>">
	<br>* deixe o campo em branco para visualizar todos os pedidos<br>

		
  <input type="submit" name="submit" value="Consultar">  
</form>


	
</body>
</html>