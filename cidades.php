<?php
 
 mysql_connect("localhost", "daw2014", "1234");
         			mysql_select_db("daw");
 
$estado = $_POST['estado'];

 
//$sql = "SELECT `ID_CATEGORIA2`, `NOME_CATEGORIA2`, `STATUS`, `ID_CATEGORIA1` FROM `tb_categoria2` WHERE ID_CATEGORIA1 =$estado";
//$sql = "SELECT * FROM tb_cidades WHERE estado = '$estado' ORDER BY nome ASC";

$sql = "SELECT * FROM `cidades` WHERE idEstado = '$estado'";
$qr = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Nao tem Categoria').'</option>';
    
}else{
   while($ln = mysql_fetch_assoc($qr)){
      echo '<option value="'.$ln['idCidade'].'">'.$ln['nomeCidade'].'</option>';
   }
}
 
?>