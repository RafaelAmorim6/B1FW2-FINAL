 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "DUCHEF";
 $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//-------------------------------------------------------------------------------
//funcao que insere novos clientes na base---------------------------------------
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
//-------------------------------------------------------------------------------

//funcao que insere novos produtos na base---------------------------------------
function insertProduto($name,$value)
{
	$sql = "INSERT INTO produtos (NOME_PRODUTO, VALOR_PRODUTO) VALUES ('$name',$value);";
	
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
//-------------------------------------------------------------------------------
//---------funcao que exibe os clientes------------------------------------------

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
//-------------------------------------------------------------------------------
//-----------Funcao que exibe os produtos----------------------------------------

function selectProdutos()
{
	global $conn;
      
	$sql = "SELECT cod_produto,NOME_PRODUTO, VALOR_PRODUTO,qtd_vendida FROM produtos";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<h3>ID: " . $row["cod_produto"]. " - Produto: " . $row["NOME_PRODUTO"]. " - Valor: R$" . $row["VALOR_PRODUTO"]." - Quantidade vendida: " . $row["qtd_vendida"]. " unidades</h3><br>";
		}
	} 
	else
	{
		echo "<h3>0 results</h3>";
	}



}
//-------------------------------------------------------------------------------
//------------funcao que exibe os pedidos---------------------------------------

function consultaPedidos($cliente)
{
	
	global $conn;
      
if (empty($_POST["cliente"])) 
{
      
	$sql = "SELECT id_pedido,id_cliente, id_produto, id_bebida, data_pedido FROM PEDIDOS";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			echo "<h3>Pedido n. " . $row["id_pedido"]. " - ID CLIENTE: " . $row["id_cliente"]. " - ID PRODUTO: " . $row["id_produto"]." - ID BEBIDA: " . $row["id_bebida"]. " - Data do Pedido: " . $row["data_pedido"]."</h3><br>";
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
			echo "<h3>Pedido n. " . $row["id"]. " - Nome: " . $row["nome"]. " - Endereço: " . $row["endereco"]." - Telefone: " . $row["telefone"]. " - Data do Pedido: " . $row["email"]."</h3><br>";
		}
	} 
	else
	{
		echo "0 results";
	}
}
/*
TESTE INNER JOIN

SELECT CLIENTES.ID, CLIENTES.NOME, CLIENTES.TELEFONE, PEDIDOS.ID
FROM CLIENTES 
INNER JOIN PEDIDOS
ON CLIENTES.ID=PEDIDOS.ID_CLIENTE
INNER JOIN PRODUTOS.NOME







*/


	
}
//funcao que insere novos pedidos na base---------------------------------------
function inserePedidos($idCliente,$pizza,$bebida)
{
	
	$sql = "INSERT INTO PEDIDOS (id_cliente, id_produto, id_bebida, data_pedido)
VALUES ($idCliente,$pizza,$bebida,now());";
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
//-------------------------------------------------------------------------------






?> 