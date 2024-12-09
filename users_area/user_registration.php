<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Tecno Valle</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>

    <div class="register">
        <div class="container py-3">
            <h2 class="text-center mb-4">Registrate!!!</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-4">
                        <!-- username field  -->
                        <div class="form-outline">
                            <label for="user_username" class="form-label">Nombre</label>
                            <input type="text" placeholder="Ingresa tu nombre" autocomplete="off" required="required" name="user_username" id="user_username" class="form-control">
                        </div>
                        <!-- email field  -->
                        <div class="form-outline">
                            <label for="user_email" class="form-label">Correo</label>
                            <input type="email" placeholder="Ingresa tu correo" autocomplete="off" required="required" name="user_email" id="user_email" class="form-control">
                        </div>
                        <!-- image field  -->
                        <div class="form-outline">
                            <label for="user_image" class="form-label">Foto de perfil</label>
                            <input type="file" required="required" name="user_image" id="user_image" class="form-control">
                        </div>
                        <!-- password field  -->
                        <div class="form-outline">
                            <label for="user_password" class="form-label">Contraseña</label>
                            <input type="password" placeholder="Ingresa una contraseña" autocomplete="off" required="required" name="user_password" id="user_password" class="form-control">
                        </div>
                        <!-- confirm password field  -->
                        <div class="form-outline">
                            <label for="conf_user_password" class="form-label">Confirma la contraseña</label>
                            <input type="password" placeholder="Confirma la contraseña" autocomplete="off" required="required" name="conf_user_password" id="conf_user_password" class="form-control">
                        </div>
                        <!-- address field  -->
                        <div class="form-outline">
                            <label for="user_address" class="form-label">Direccion</label>
                            <input type="text" placeholder="Ingresa tu direccion" autocomplete="off" required="required" name="user_address" id="user_address" class="form-control">
                        </div>
                        <!-- mobile field  -->
                        <div class="form-outline">
                            <label for="user_mobile" class="form-label">Telefono</label>
                            <input type="text" placeholder="Ingresa numero telefonico" autocomplete="off" required="required" name="user_mobile" id="user_mobile" class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Register" class="btn btn-primary mb-2" name="user_register">
                            <p>
                                Tienes cuenta? <a href="user_login.php" class="text-primary text-decoration-underline"><strong>Iniciar sesion</strong></a>
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
<!-- php code  -->
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    // check if user exist or not
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $select_result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($select_result);
    if ($rows_count > 0) {
        echo "<script>window.alert('Username | El correo electrónico ya existe');</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>window.alert('Las contraseñas no coinciden');</script>";
    } else {
        // insert query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>window.alert('Te Registrastes exitosamente :)');</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>