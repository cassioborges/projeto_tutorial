<?php
 function conn_mysql(){
 	
   $servidor = 'br-cdbr-azure-south-a.cloudapp.net';
   $porta = 3306;
   $banco = "cassiodb";
   $usuario = "b5431faf62c2d2";
   $senha = "62f48895";
   
      $conn = new PDO("mysql:host=$servidor;
	                   port=$porta;
					   dbname=$banco", 
					   $usuario, 
					   $senha,
					   array(PDO::ATTR_PERSISTENT => true)
					   );
      return $conn;
   }
?>
