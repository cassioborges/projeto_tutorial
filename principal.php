<?php
require_once("./authSession.php");
require_once("confBD.php");
//include_once("cabecalho.php");
?>

	  

  

      	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
    $login = utf8_encode($_SESSION['nomeUsuario']);
				
	// instrução SQL básica (sem restrição de nome)
	$SQLSelect = 'SELECT p.*, e.nomeEstado, c.nomeCidade FROM participantes as p left join cidades c on (c.idCidade = p.cidade) left join estados e on (e.idEstado = c.idEstado) WHERE login = ?';
	
    //prepara a execução da sentença
	$operacao = $conexao->prepare($SQLSelect);	
	  
	$pesquisar = $operacao->execute(array($login));
	//captura TODOS os resultados obtidos
	$resultados = $operacao->fetchAll();
	// fecha a conexão (os resultados já estão capturados)
	$conexao = null;
    
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
      <h1 class="project-name"><a href="#">Yearbook - Cassio Borges</a></h1>
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
        <li><a href="index.php" class="active ico-home" role="menuitem">Home</a></li>
       
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
          .<br><br>
     <div class="starter-template">
                    <h3 class="sub-header">Seja bem vindo - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?>
                    </h3>    
      </div>	
    
<div class="row">
<div class="col-md-4"><img id = "imagem" src="<?php echo $resultados[0]['arquivoFoto']?>" alt="Cassio Borges" width="280" height="300"/>


</div>
  <div class="col-md-8">
  					<h2>Dados Pessoais</h2><br>
                    <h4>Nome:
                    <?php echo $resultados[0]['nomeCompleto']?></h4>
                    <h4>Estado:</h4>
                    <?php echo $resultados[0]['nomeEstado']?>
                    <h4>Cidade:</h4>
                    <?php echo $resultados[0]['nomeCidade']?>
                     
                    <h4>E-mail:
                    <?php echo $resultados[0]['email']?></h4>
                    <h4>Descrição:</h4>
                    <?php echo $resultados[0]['descricao']?> <br>
                    
                    <a   class="btn btn-success" " href="alteraUsuario.php?login=<?php echo $login ?>">Alterar Dados</a>  
         <a  class="btn btn-warning" href="alteraFoto.php?login=<?php echo $login ?>">Alterar Foto</a>  
   
</div>
     
                
    
                
                    
                 
               
        
        
        
                    
            
             
                
                
             


	
<?php
        } //try
	catch (PDOException $e)
	{
		// caso ocorra uma exceção, exibe na tela
		echo "Erro!: " . $e->getMessage() . "<br>";
		die();
	}
	  
  ?>

        <aside class="col-md-3 sidebar" role="complementary">
          
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