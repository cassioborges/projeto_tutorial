<?php 
	include("confBD.php");
	//$sql = "SELECT * FROM `estados`";
	//echo '<pre>';
  		//print_r($sql);
  	//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Seu produto</title>
  <meta charset="utf-8">
 
  <!-- Isso é necessário para funcionar a versão mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
  <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
  <script type="text/javascript">
       
      $(document).ready(function()
	  { 
         $("select[name=estado]").change(function()
		 {
            $("select[name=cidade]").html('<option value="0">Carregando...</option>');
             
            $.post("cidades.php",
                  {estado:$(this).val()},
                  function(valor)
				  {
                     $("select[name=cidade]").html(valor);
            	  })
             
         })
		 
		
        $("select[name=cidade]").change(function()
		 {
            $("select[name=bairro]").html('<option value="0">Carregando...</option>');
             
            $.post("bairros.php",
                  {cidade:$(this).val()},
                  function(valor)
				  {
                     $("select[name=bairro]").html(valor);
            	  })
             
         })
		 
      })
       
</script>

   <script type="text/javascript"> 
    $(document).ready(function(){ 
        
            $(document).ready(function(e){
               
                $('#btnEstados').hide();
                $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>'); 
                 
                $.getJSON('consulta.php?opcao=estado', 
                          function (dados){ if (dados.length > 0){ 
                              var option = '<option>Selecione o Estado</option>'; 
                              $.each(dados, function(i, obj){ 
                                  option += '<option value="'+obj.idEstado+'">'+obj.sigaEstado+'</option>';
                              }) 
                              $('#mensagem').html('<span class="mensagem">Total de estados encontrados.: '+dados.length+'</span>');
                              $('#cmbEstado').html(option).show();
                          }else{
                              Reset(); 
                              $('#mensagem').html('<span class="mensagem">Não foram encontrados estados!</span>');
                          }
                 })
              
                    
            })      
                
            
       
          $('#cmbEstado').change(function(e){ 
              
                 var estado = $('#cmbEstado').val(); 
             
                 $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');
                 $.getJSON('consulta.php?opcao=cidade&valor='+estado, function (dados){ 
                     if (dados.length > 0){
                         var option = '<option>Selecione a Cidade</option>'; 
                        $.each(dados, function(i, obj){ option += '<option value="'+obj.idCidade+'">'+obj.nomeCidade+'</option>';
                                                       }) 
                         $('#mensagem').html('<span class="mensagem">Total de cidades encontradas.: '+dados.length+'</span>');
                     }else{
                         Reset(); 
                         $('#mensagem').html('<span class="mensagem">Não foram encontradas cidades para esse estado!</span>');
                     } $('#cmbCidade').html(option).show(); 
                 })
         })
                
//          function Reset(){ 
//                $('#cmbEstado').empty().append('<option>Carregar Países</option>>'); 
//               $('#cmbCidade').empty().append('<option>Carregar Cidades</option>'); 
//           }
            
            
            })  ;      
            
    
                               

</script> 


 
</head>
<body>
 
 
  <!-- Header principal -->
  <header class="header" role="banner">
    <div class="container">
      <span class="control-menu visible-xs ico-menu-2"></span>
      <span class="control-sidebar visible-xs ico-list"></span>
      <h3 class="project-name"><a href="#">Yearbook - Cassio Borges</a></h3>
      <!-- <a href="#" class="help-suggestions ico-question hidden-xs">Ajuda e Sugestões</a> -->
 
      <!--<div class="dropdown hidden-xs">
        <a href="#" data-toggle="dropdown" class="title-dropdown">emkt2013</a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          <li><a href="#" role="menuitem">Option 1</a></li>
          <li><a href="#" role="menuitem">Option 2</a></li>
          <li><a href="#" role="menuitem">Option 3</a></li>
        </ul>
      </div> -->
    </div>
  </header>
 
  <!-- Menu -->
  <div class="nav-content">
    <menu class="menu">
      <ul class="container">
        <li><a href="#" class="active ico-home" role="menuitem">Home</a></li>
       
        </li>
        <li class="active"><a href="principal.php">Principal</a></li>
            <li><a href="./cadastroUsuario.php">Cadastrar Participante</a></li>
              <li><a href="./pesquisaParticipante.php">Busca Participantes</a></li>
			<li><a href="./logout.php">Sair</a></li>
      </ul>
    </menu>
    <h2 class="title-sep visible-xs">Mais</h2>
    <ul class="nav-mob-list visible-xs">
     
    </ul>
  </div>
 
  <!-- Aqui começa a parte de conteúdo dividido por colunas -->
  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-md-9 content" role="main">
          .
           
        
        
		 <form method="post" action="./cadastroNovoUsuario.php" enctype = "multipart/form-data" role = "form">
		 <h3 class="form-signin">Cadastro de Participante</h3>
         
			  <div class="form-group col-lg-4">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
              <div class="form-group col-lg-6">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="e-mail" required>
              </div>
               
            <div id="estado" class="form-group col-lg-4">
                  <label>Estado:</label> 
                  <select class="form-control" id="cmbEstado" name = "estado"> 
                      <option>Carregar Estados</option> 
                  </select> 
                  <input type="button" value="Carregar Estados" id="btnEstados" class="botao"/> 
                  
             </div> 
              
              <!-- <div id="mensagem" >
        	
        </div> -->
           
            <div class="form-group col-lg-6">
                <label>Cidade:</label> 
               <select class="form-control" id="cmbCidade" name = "cidade"> 
                    <option>Carregar Cidades</option> 
                </select> 
        
          
          </div>
			  <div class="form-group col-lg-4">
			  <label for="InputLogin">Login:</label>
				<input type="text" class="form-control" id="InputLogin" name="login" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group col-lg-3">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group col-lg-3">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>
          
         
              <input type="hidden" name="MAX_FILE_SIZE" value="500000" >
            <div class="form-group col-lg-4">
                 <label for="fileName">Foto:</label>
                <input type="file" name="fileName" id="fileName"></imput>
               
             </div>
              
              <div class="form-group col-lg-6">
                  <label for="descricao">Descrição:</label>
                  <textarea class="form-control" name="descricao"></textarea>
              </div>
          
              
        

<div class="box-actions">
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
              </div>
		 </form>

        <aside class="col-md-3 sidebar" role="complementary">
          Sidebar
        </aside>
      </div>
    </div>
  </main>
 
  <!-- Footer -->
  <footer class="footer">
    <div class="footer-menu">
      <nav class="container">
        
        <ul class="no-liststyle">
          <li><a href="#" class="bg-customer-support"><span class="visible-lg">Yearbook - Cassio Borges</span></a></li>
          
        </ul>
      </nav>
    </div>
    <div class="container footer-info">
      
      <p class="copy-right">Copyright © 2014 Cassio Henrique Borges</p>
    </div>
  </footer>
 
  <!-- Scripts - Atente-se na ordem das chamadas -->
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  
</body>
</html>