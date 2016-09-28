<?php
require 'Connect.php';

// declaracao das variaveis de validacao
$idErr = "";
$id = 0;
$verifyId = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//verifica o campo ID-------------------------------------------
  if (empty($_POST["userID"])) 
  {
    $idErr = "Favor inserir um ID";
  } 
  else 
  {
    $id = test_input($_POST["userID"]);
	if (!preg_match("/^[0-9 ]*$/",$id)) 
	{
      $idErr = "São permitidos somente números";
    }
	else
	{
		deleteClientes($id);
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
		
    <h1>Exclusão de Clientes </h1>
	
	<!--------------------------------------------------------------------------------->
		
	<p><span class="error">* campos obrigatórios.</span></p>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		ID do Cliente: <input type="number" name="userID" value="<?php echo $id;?>">
	<br><br>
		
  <input type="submit" name="submit" value="Remover">  
</form>


	
</body>
</html>
	