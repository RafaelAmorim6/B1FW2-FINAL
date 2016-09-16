<?php 
require "Connect.php";

function DBconfig()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DUCHEF";
	$con = new mysqli($servername, $username, $password);
	
	$sql ="CREATE DATABASE IF NOT EXISTS DUCHEF;"
	
	if ($con->query($sql) === TRUE) 
	{
		echo "Banco Criado";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	global $conn;
	
	$sql = "CREATE TABLE CLIENTES (ID INT(100) PRIMARY KEY AUTO_INCREMENT NOT NULL, NOME VARCHAR(100)NOT NULL DEFAULT 'NONE', ENDERECO VARCHAR(200) NOT NULL DEFAULT 'NONE', TELEFONE VARCHAR(20) NOT NULL DEFAULT '00 0000 0000', EMAIL VARCHAR(100));";
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "Registro adicionado com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	


$sql = "CREATE TABLE PEDIDOS (ID_PEDIDO INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT, ID_CLIENTE INT(100) NOT NULL DEFAULT 0, ID_PROUTO INT(100) NOT NULL DEFAULT 0, ID_BEBIDA INT(100) DEFAULT 0, DATA_PEDIDO DATE);";
	

	if ($conn->query($sql) === TRUE) 
	{
		echo "Registro adicionado com sucesso";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}



$sql = "CREATE TABLE PRODUTOS (COD_PRODUTO INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT, NOME_PRODUTO VARCHAR(100) NOT NULL, VALOR_PRODUTO INT(100) DEFAULT 0, QTD_VENDIDA INT(100) DEFAULT 0);";
	
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

DBconfig();
?>