<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$phone ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  //verifica o campo telefone-------------------------------------------
  if (empty($_POST["phone"])) 
  {
    selectClientes($phone);
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
		selectClientes($phone);
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
		
    <h1> Consulta de Clientes </h1>
	
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		Telefone do Cliente: <input type="text" name="phone" value="<?php echo $phone;?>">
	<br>* deixe o campo em branco para visualizar todos<br>

		
  <input type="submit" name="submit" value="Submit">  
</form>


	
</body>
</html>