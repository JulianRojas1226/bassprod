<?php
    session_start();
    include('conexion_be.php');

    if (isset($_POST['Usuario']) && isset($_POST['Codigo'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

// validacion de los campos requeridos
    $Usuario = validate($_POST['Usuario']);
    $Codigo = validate($_POST['Codigo']);

// se manda una alerta si el campo requerido esta en blanco
    if (empty($Usuario)){
        header("Location: ../inse.php?error=El usuario es requerido");
        exit();
    }
    elseif (empty($Codigo)){
        header("Location: ../inse.php?error=El codigo es requerido");
        exit();
}
// incriptar contraseña
    else{
        // $Codigo= md5($Codigo);

        $sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Codigo = '$Codigo'";
        $result = mysqli_query($Conexion, $sql);

// se manda alerta si los datos ingresados son erroneos
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['Usuario'] == $Usuario && $row['Codigo'] == $Codigo){
            $_SESSION['Usuario'] = $row['Usuario'];
            header("Location: ../admin/admin.php");
            exit();
        }else{
            header("Location: ../inse.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }else{
        header("Location: ../inse.php?error=El usuario o la clave son incorrectas");
        exit();
    }

    }
}else{
    header("Location: ../admin.php");
    exit();
}
?>