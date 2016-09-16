<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$idErr = $pizzaErr = $drinkErr = "";
$idCliente = $pizza = $bebida = 0;
$verifyCliente = $verifyProduto = $verifyBebida = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
//verifica o campo ID----------------------------------------------------------
  if (empty($_POST["idCliente"])) 
  {
    $idErr = "O ID é obrigatório";
  } 
  else 
  {
    $idCliente = test_input($_POST["idCliente"]);
	if (!preg_match("/^[0-9 ]*$/",$idCliente)) 
	{
      $idErr = "São permitidos somente números";
    }
	else
	{
		$verifyCliente = 1;
	}
  }
 //verifica o campo pizza ------------------------------------------------
  if (empty($_POST["pizza"])) 
  {
    $pizzaErr = "O sabor da pizza é obrigatório";
  } 
  else 
  {
    $pizza = test_input($_POST["pizza"]);
	if (!preg_match("/^[0-9 ]*$/",$pizza)) 
	{
      $pizzaErr = "São permitidos somente números";
    }
	else
	{
		$verifyProduto = 1;
	}
  }
  //verifica o campo bebida-------------------------------------------
  if (empty($_POST["bebida"])) 
  {
    $bebida = 0;
	$verifyBebida = 1;
  } 
  else 
  {
    $bebida = test_input($_POST["bebida"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$bebida)) 
	{
      $drinkErr = "São permitidos somente números";
    }
	else
	{
		
		$verifyBebida = 1;
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

  //se todos os campos == OK, insere no banco
 if ($verifyCliente == 1 && $verifyProduto == 1 && $verifyBebida == 1 )
 {
	 inserePedidos($idCliente,$pizza,$bebida);
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
		
    <h1> Cadastro de Pedidos </h1>
	
	<!--------------------------------------------------------------------------------->
		
	<p><span class="error">* campos obrigatórios.</span></p>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		
		ID Cliente: <input type="number" name="idCliente" value="<?php echo $idCliente;?>">
		<span class="error">* <?php echo $idErr;?></span>
	<br><br>
		
		ID Pizza: <input type="number" name="pizza" value="<?php echo $pizza;?>">
		<span class="error">* <?php echo $pizzaErr;?></span>
	<br><br>
	
	
		Bebida: <input type="number" name="bebida" value="<?php echo $bebida;?>">
		<span class="error">* <?php echo $drinkErr;?></span>
	<br><br>
	<br><br>
		
				
  <input type="submit" name="submit" value="Cadastrar Pedido">  
</form>


	
</body>
</html>