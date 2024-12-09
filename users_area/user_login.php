<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion Valle Tech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>

    <div class="register">
        <div class="container py-3">
            <h2 class="text-center mb-4">Inicio de sesion</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post" class="d-flex flex-column gap-4">
                        <div class="form-outline">
                            <label for="user_username" class="form-label">Nombre Usuario</label>
                            <input type="text" placeholder="Ingresa tu Usuario" autocomplete="off" required="required" name="user_username" id="user_username" class="form-control">
                        </div>
                        <div class="form-outline">
                            <label for="user_password" class="form-label">Contraseña</label>
                            <input type="password" placeholder="Ingresa la contraseña" autocomplete="off" required="required" name="user_password" id="user_password" class="form-control">
                        </div>
                        <div><a href="" class="text-decoration-underline">Olvidastes tu contraseña?</a></div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-primary mb-2" name="user_login">
                            <p>
                                No tienes cuenta? <a href="user_registration.php" class="text-primary text-decoration-underline"><strong>Registrate!!!</strong></a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets//js/bootstrap.bundle.js"></script>
</body>

</html>
<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
    $select_result = mysqli_query($con, $select_query);
    $row_data = mysqli_fetch_assoc($select_result);
    $row_count = mysqli_num_rows($select_result);
    $user_ip = getIPAddress();
     
    $select_cart_query = "SELECT * FROM `card_details` WHERE ip_address='$user_ip'";
    $select_cart_result = mysqli_query($con, $select_cart_query);
    $row_cart_count = mysqli_num_rows($select_cart_result);
   
    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login Successfully')</script>";
            $_SESSION['username'] = $user_username;
            if ($row_count == 1 && $row_cart_count == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Bienvenido');</script>";
                echo "<script>window.open('profile.php','_self');</script>";
            } else if ($row_count == 1 && $row_cart_count > 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Bienvenido');</script>";
                echo "<script>window.open('payment.php','_self');</script>";
            }
        } else {
            echo "<script>alert('Datos incorrectos')</script>";
        }
    } else {
        echo "<script>alert('Datos incorrectos')</script>";
    }
}
?>