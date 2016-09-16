<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$nameErr = $emailErr = $addressErr = $phoneErr = "";
$name = $email = $phone = $address = "";
$verifyName = $verifyAddress = $verifyPhone = $verifyEmail = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
//verifica o campo nome----------------------------------------------------------
  if (empty($_POST["name"])) 
  {
    $nameErr = "Nome é obrigatório";
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
 //verifica o campo endereco  ------------------------------------------------
  if (empty($_POST["address"])) 
  {
    $addressErr = "Endereco é obrigatório";
  } 
  else 
  {
    $address = test_input($_POST["address"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$address)) 
	{
      $addressErr = "São permitidos somente espacos e letras";
    }
	else
	{
		$verifyAddress = 1;
	}
  }
  //verifica o campo telefone-------------------------------------------
  if (empty($_POST["phone"])) 
  {
    $phoneErr = "Telefone é obrigatório";
  } 
  else 
  {
    $phone = test_input($_POST["phone"]);
	if (!preg_match("/^[0-9 ]*$/",$phone)) 
	{
      $phoneErr = "São permitidos somente números";
    }
	else
	{
		$verifyPhone = 1;
	}
  }
 //verifica o campo email------------------------------------------------------
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email é obrigatório";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $emailErr = "Formato inválido de email";
    }
	else
	{
		$verifyEmail = 1;
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
 if ($verifyName == 1 && $verifyAddress == 1 && $verifyPhone == 1 && $verifyEmail == 1)
 {
	 insertCliente($name,$address,$phone,$email);
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
		
    <h1> Cadastro de Clientes </h1>
	
	<!--------------------------------------------------------------------------------->
		
	<p><span class="error">* campos obrigatórios.</span></p>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		Nome: <input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	
		Endereco: <input type="text" name="address" value="<?php echo $address;?>">
		<span class="error">* <?php echo $addressErr;?></span>
	<br><br>
	
		Telefone: <input type="text" name="phone" value="<?php echo $phone;?>">
		<span class="error">* <?php echo $phoneErr;?></span>
	<br><br>
	
		E-mail: <input type="email" name="email" value="<?php echo $email;?>">
		<span class="error">* <?php echo $emailErr;?></span>
	<br><br>
		
  <input type="submit" name="submit" value="Cadastrar">  
</form>


	
</body>
</html>
	