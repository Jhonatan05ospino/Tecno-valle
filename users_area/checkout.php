<?php
include('../includes/connect.php');

@session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina para pagos Tecno Valle</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Oferta de fin de año para todos los celulares y entrega exprés gratuita: ¡50 % de descuento! <a>Compra Ahora</a></span>
    </div>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Tecno Valle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./users_area/user_registration.php">Registrar</a>
                    </li>
                </ul>
                
                    
                    
                
                <ul class="navbar-nav mb-2 mb-lg-0">
                   
                        
                                 
                                 
                                
                                
                            
                            
                                <?php
                                
                                ?>
                            
                            
                                 
                                <?php
                                
                                ?>
                            
                        
                    
                    <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>
                                Bienvenido!
                            </span>
                        </a>
                    </li>
                    <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Login
                        </a>
                    </li>";
                }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Logout
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    

    
    <div class="landing">
        <div class="container">
            <div class="row m-0">
                <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('payment.php');
                    }
                ?>
            </div>
        </div>
    </div>
    














    
    
        
    
    




    
    
        
    
    

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>