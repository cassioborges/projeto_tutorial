<?php
setcookie("login", '', time()-42000); 
setcookie("loginAutomatico", '', time()-42000); 


?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Seu produto</title>
  <meta charset="utf-8">
 
  <!-- Isso é necessário para funcionar a versão mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
 
</head>
<body>
 
 
 
 
 
  <!-- Aqui começa a parte de conteúdo dividido por colunas -->
  <main class="main">
    <div class="container">
     <div class="parent-login">
  <div class="parent-inner">

    <div class="box-login">
      <h3 style="text-align:center;margin:10px"><img src="fotos/logo_puc_minas_virtual.jpg" width="160" height="60" align="center" alt=""/></h3>

    <div class="erro">

      <div>
        <h1>Erro foto 1.</h1>
		<p><a href="alteraFoto.php">Voltar.</a></p>
        
	 </div>

	  
	  
    </div>


 </div>

  </div>
</div>
    </div>
  </main>
 
 
 
  <!-- Scripts - Atente-se na ordem das chamadas -->
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>
</html>