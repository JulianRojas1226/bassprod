<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$empresa=$_POST["empresa"];
$usuario=$_POST["usuario"];
$codigo=$_POST["codigo"];
$validar =mysqli_query($conn,"select * from usuarios where empresa='$empresa'and codigo='$codigo'");
if($usuario=="admin"){
    if(mysqli_num_rows($validar)>0){
    header('location:../admin.html');
    }   
}else{
    echo "no registrado";
}






?>
</body>
</html>