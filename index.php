<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/styles.css" />
</head>

<body>

    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Usuario</label>
            <input class="input" type="text" name="usuario" pattern="[a-zA-Z0-9]+" required />
            <a href="Principal.php?usuario= $usuario"></a>
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Log In</button>
    </form>

    <?php
$phpVariable = "Dog";
 
    if (isset($_POST['login'])) {

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if ($conm = mysqli_connect("localhost", "root", "", "php")) {
            $query = mysqli_query($conm, "SELECT * FROM usuarios");

            while ($row = mysqli_fetch_array($query)) {

                if ($usuario != $row[2]) {
                    echo "<h2>Usuario no registrado</h2>";
                } else if ($usuario == $row[2] && $password == $row[3]) {
                    session_start();
                    $_SESSION[$row[2]] = $usuario;
                    header("Location: Principal.php");
                } else {
                    echo " <h2>Usuario o contraseña no validos</h2>";
                }
            }
        } else {
            echo "No hay conexion";
        }
    }

    ?>

</body>

</html>