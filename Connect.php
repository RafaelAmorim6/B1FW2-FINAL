 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "DUCHEF";
 $conn = new mysqli($servername, $username, $password,$dbname);

// ------------------Check connection------------------
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//--------------------------------------------------

//funcao que insere novos clientes na base------------------
function insertCliente($name,$address,$phone,$email)
{
	
	$sql = "INSERT INTO CLIENTES (nome, endereco, telefone, email)
VALUES ('$name','$address','$phone','$email');";
	global $conn;
	if ($conn->query($sql) === TRUE) 
	{
		echo "Registro adicionado com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
//----------------------------------------------

//funcao que insere novos produtos na base----------------
function insertProduto($name,$value)
{
	$sql = "INSERT INTO produtos (NOME, VALOR) VALUES ('$name',$value);";
	
	global $conn;
	if ($conn->query($sql) === TRUE) 
	{
		echo "Registro adicionado com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
//------------------------------------------

//---------funcao que exibe os clientes--------

function selectClientes($phone)
{
global $conn;
if (empty($_POST["phone"])) 
{
      
	$sql = "SELECT id,nome,endereco,telefone,email FROM CLIENTES";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<h3>ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Endereço: " . $row["endereco"]." - Telefone: " . $row["telefone"]. " - Email: " . $row["email"]."</h3><br>";
		}
	} 
	else
	{
		echo "<h3>0 results</h3>";
	}
} 
else 
{
	$sql = "SELECT id,nome,endereco,telefone,email FROM CLIENTES WHERE TELEFONE=$phone";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<h3>ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Endereço: " . $row["endereco"]." - Telefone: " . $row["telefone"]. " - Email: " . $row["email"]."</h3><br>";
		}
	} 
	else
	{
		echo "0 results";
	}
}
}
//-------------------------------------------------------


//-----------Funcao que exibe os produtos-------------------

function selectProdutos()
{
	global $conn;
      
	$sql = "SELECT id,nome,valor,qtd_vendida FROM produtos";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<h3>ID: " . $row["id"]. " - Produto: " . $row["nome"]. " - Valor: R$" . $row["valor"]." - Quantidade vendida: " . $row["qtd_vendida"]. " unidades</h3><br>";
		}
	} 
	else
	{
		echo "<h3>0 results</h3>";
	}



}
//------------------------------------------------------

//------------funcao que exibe os pedidos-------------------

function consultaPedidos($cliente)
{
	
	global $conn;
      
if (empty($_POST["cliente"])) 
{
      
	$sql = "SELECT CLI.ID, CLI.NOME, CLI.TELEFONE, PED.ID_PEDIDOS, PROD.NOME, PROD.VALOR, PED.DATA_PEDIDO
			FROM CLIENTES CLI
			INNER JOIN PEDIDOS PED
			ON CLI.ID=PED.ID_CLIENTE
			INNER JOIN PRODUTOS PROD
			ON PROD.ID=PED.ID_PRODUTO
			ORDER BY CLI.ID
			;";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			
				/*var_dump($row);*/
			
			echo "Pedido n. " . $row["ID_PEDIDOS"]. 
			" - Nome: " . $row["NOME"]. 
			" - Telefone: " . $row["TELEFONE"].
			" - ID Cliente: " . $row["ID"]. 
			" - Data do Pedido: " . $row["DATA_PEDIDO"].
			" - Valor do Produto: " . $row["VALOR"].
			" - Produto: " . $row["NOME"].
			"<br>";
			
		}
	} 
	else
	{
		echo "<h3>0 results</h3>";
	}
} 
else 
{
	$sql = "SELECT CLI.ID, CLI.NOME, CLI.TELEFONE, PED.ID, PROD.NOME,PROD.VALOR, PED.DATA_PEDIDO
			FROM CLIENTES CLI
			INNER JOIN PEDIDOS PED
			ON CLI.ID=PED.ID_CLIENTE
			INNER JOIN PRODUTOS PROD
			ON PROD.ID=PED.ID_PRODUTO
			ORDER BY CLI.ID
			WHERE CLI.ID=$cliente";
			
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "Pedido n. " . $row["PED.ID"]. 
				 " - Nome: " . $row["CLI.NOME"]. 
				 " - Telefone: " . $row["CLI.TELEFONE"].
				 " - ID Cliente: " . $row["CLI.ID"]. 
				 " - Data do Pedido: " . $row["PED.DATA"].
				 " - Valor do Produto: " . $row["PROD.VALOR"].
				 " - Produto: " . $row["PROD.NOME"].
				 "<br>";
		}
	} 
	else
	{
		echo "0 results";
	}
}

/*
TESTE INNER JOIN

SELECT CLI.ID, CLI.NOME, CLI.TELEFONE
FROM CLIENTES CLI
INNER JOIN PEDIDOS PED
ON CLI.ID=PED.ID_CLIENTE
INNER JOIN PRODUTOS PROD
ON PROD.ID=PED.ID_PRODUTO
ORDER BY CLI.ID





*/


	
}
//------------------------------------

//funcao que insere novos pedidos na base----------------
function inserePedidos($idCliente,$pizza,$bebida)
{
	
	$sql = "INSERT INTO PEDIDOS (id_cliente, id_produto, id_bebida, data_pedido)
VALUES ($idCliente,$pizza,$bebida,NOW());";
	global $conn;
	if ($conn->query($sql) === TRUE) 
	{
		echo "Registro adicionado com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
//-------------------------------------------------

//funcao que deleta clientes da base--------------------
function deleteClientes($id)
{
	$sql = "DELETE FROM CLIENTES WHERE ID=$id;";
	global $conn;
	if ($conn->query($sql) === TRUE) 
	{
		echo "Cliente removido com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
//--------------------------------------------------------

//funcao que deleta produtos da base--------------------
function deleteProdutos($id)
{
	$sql = "DELETE FROM PRODUTOS WHERE ID=$id;";
	global $conn;
	if ($conn->query($sql) === TRUE) 
	{
		echo "Produto removido com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
//----------------------------------------------------



?> 