<?php
 function conn_mysql(){

   $servidor = '127.0.0.1';
   $porta = 3306;
   $banco = "cassi639_daw";
   $usuario = "cassi639_daw2014";
   $senha = "123456";
   
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