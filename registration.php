<?php
<?php
// DB connection info
$host = "br-cdbr-azure-south-a.cloudapp.net";
$user = "b5431faf62c2d2";
$pwd = "62f48895";
$db = "cassiodb";
try{
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = "CREATE TABLE teste(
                id INT NOT NULL AUTO_INCREMENT, 
                PRIMARY KEY(id),
                name VARCHAR(30),
                email VARCHAR(30),
                date DATE)";
    $conn->query($sql);
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>
