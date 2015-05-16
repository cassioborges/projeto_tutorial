<?php

if(isset($_COOKIE['loginAutomatico'])){
   header("Location: ./VerificarLogin.php");
}
else if(isset($_COOKIE['login']))
	$nomeUser = $_COOKIE['login'];
	else $nomeUser="";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Yearbook - Cassio Borges</title>
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
      <h3 style="text-align:center;margin:10px"><img src="fotos/logo_puc_minas_virtual.jpg" width="160" height="60" align="center" alt=""/>Yearbook - Cassio Borges</h3>
      <form class="form-signin" role="form" method="post" action="./verificarLogin.php">
        <fieldset>
          <div class="form-group ls-login-user">
            <label for="userLogin">Usuário</label>
            <input class="form-control ls-login-bg-user input-lg" type="text" placeholder="Login" name="login" value="<?php echo $nomeUser?>"required autofocus>
          </div>

          <div class="form-group ls-login-password">
            <label for="userPassword">Senha</label>
             <input type="password" class="form-control ls-login-bg-password input-lg" placeholder="Senha" name="senha" required>
            
          </div>

          <div class="checkbox">
			<input type="checkbox"  name="lembrarLogin" value="loginAutomatico"> 
			<label for="checkbox-1"> Permanecer conectado</label>
		</div>

          <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block">
          <p class="txt-center ls-login-signup">Não possui um usuário? <a href="cadastroUsuario.php">Cadastre-se agora</a></p>

        </fieldset>
      </form>
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