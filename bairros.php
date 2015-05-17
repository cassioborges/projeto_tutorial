<?php

//mysql_connect("br-cdbr-azure-south-a.cloudapp.net", "b5431faf62c2d2", "62f48895");
         				//mysql_select_db("cassiodb");
 
$estado = $_POST['cidade'];

//$sql = "SELECT `ID_CATEGORIA3`, `NOME_CATEGORIA3`, `STATUS`, `ID_CATEGORIA2`, `ID_CATEGORIA1` FROM `tb_categoria3` WHERE id_categoria2 = $estado";

//$sql = "SELECT * FROM tb_bairros WHERE cidade = '$estado' ORDER BY nome ASC";

$sql = "SELECT * FROM `tb_categoria3` WHERE id_categoria2 = '$estado'";

$qr = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Nao tem Sub categoria').'</option>';
    
}else{
   while($ln = mysql_fetch_assoc($qr)){
      echo '<option value="'.$ln['ID_CATEGORIA3'].'">'.$ln['NOME_CATEGORIA3'].'</option>';
   }
}
 
?>
