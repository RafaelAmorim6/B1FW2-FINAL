<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$nameErr = $valorErr = "";
$name = "";
$valor = 0;
$verifyName = $verifyValue = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
//verifica o campo nome----------------------------------------------------------
  if (empty($_POST["name"])) 
  {
    $nameErr = "O nome do Produto é obrigatório";
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
	{
      $nameErr = "São permitidos somente espacos e letras";
    }
	else
	{
		$verifyName = 1;
	}
  }
 //verifica o campo valor-------------------------------------------
  if (empty($_POST["valor"])) 
  {
    $valorErr = "O valor do Produto é obrigatório";
  } 
  else 
  {
    $valor = test_input($_POST["valor"]);
	if (!preg_match("/^[0-9 ]*$/",$valor)) 
	{
      $valorErr = "São permitidos somente números";
    }
	else
	{
		$verifyValue = 1;
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
 if ($verifyName == 1 && $verifyValue == 1)
 {
	 insertProduto($name,$valor);
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
		
    <h1> Cadastro de Produtos </h1>
	
	<!--------------------------------------------------------------------------------->
		
	<p><span class="error">* campos obrigatórios.</span></p>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		
		Produto: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	
		Valor: <input type="number" name="valor" value="<?php echo $valor;?>">
		<span class="error">* <?php echo $valorErr;?></span>
	<br><br>	
				
  <input type="submit" name="submit" value="Cadastrar">  
</form>


	
</body>
</html>
	