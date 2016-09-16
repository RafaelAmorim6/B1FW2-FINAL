<?php
function pageHeader()
	{
	    echo'<!DOCTYPE html>';
		echo'<html><head>';
		echo'<meta charset="utf-8">';
		echo'<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		echo'<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo'<meta name="description" content="Projeto da disciplina B1FW2">';
	    echo'<title>Pizza DuChef</title>';
	    echo'<link href="visual/style.css" rel="stylesheet">';
		echo'<link rel="icon" href="visual/pizzaicon.png">';
	    echo'</head><body>';
		echo'<div class="logo">';
		//echo'<a href="Easter.php" target="iframe"><img src="visual/logo.png" id="pink" alt="pinkguy"/></a>';
		//echo'<img src="visual/name.png" id="name" alt="logo"/>';
		echo'<img src="visual/mensagem.jpg" id="mensagem" alt="mensagem"/>';
		echo'</div>';
		echo'<div class="menubar">';
		echo'<div class="menubutton"><a href="Pedidos.php" target="iframe">Pedidos</a></div>';
		echo'<div class="menubutton"><a href="Clientes.php" target="iframe">Nossos Clientes</a></div>';
		echo'<div class="menubutton"><a href="Cardapio.php" target="iframe">Cardápio</a></div>';
		echo'<div class="menubutton"><a href="CadPizza.php" target="iframe">Cadastrar Produto</a></div>';
		//echo'<div class="menubutton"><a href="" target="iframe">Excluir Produto</a></div>';
		echo'<div class="menubutton"><a href="CadClientes.php" target="iframe">Cadastrar Cliente</a></div>';
		//echo'<div class="menubutton"><a href="" target="iframe">Excluir Cliente</a></div>';
		
		echo'<div class="menubutton"><a href="CadPedido.php" target="iframe">Novo Pedido</a></div>';
		echo'';
		echo'</div>';
		
		echo'<iframe src="CadClientes.php"  id="iframe" name="iframe"></iframe>';
	    


	}
	
	function pageFooter()
	{
		echo'<div class="footer">';
        echo'© 2016 IFSP - B1FW2 - Rafael Amorim Coelho Ribeiro - 1567934';
		echo'</div>';
		echo'</body></html>';

		
	}
	
	function pageContent()
	{
		echo'';
		
		
	}
	pageHeader();
	pageContent();
	pageFooter();

?>