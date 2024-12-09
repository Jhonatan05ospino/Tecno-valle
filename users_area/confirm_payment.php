<?php
include("../includes/connect.php");
include("../functions/common_functions.php");
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_order_query = "SELECT * FROM `user_orders` WHERE order_id = '$order_id'";
    $select_order_result = mysqli_query($con,$select_order_query);
    $row_fetch = mysqli_fetch_array($select_order_result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];

}
if(isset($_POST['confirm_payment'])){
    
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $insert_payment_query = "INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_method) VALUES ($order_id,$invoice_number,$amount,'$payment_method')";
    $insert_payment_result = mysqli_query($con,$insert_payment_query);
    if($insert_payment_result){
        echo "<script>window.alert('Payment completed successfully');</script>";
        echo "<script>window.open('profile.php?my_orders','_self');</script>";
    }
    
    $update_orders_query = "UPDATE `user_orders` SET order_status = 'paid' WHERE order_id = $order_id";
    $update_orders_result = mysqli_query($con,$update_orders_query);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Pagos</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Estamos encantados de ayudarte | Deseamos que compres de nuevo en nuestra Tienda</span>
    </div>
    
    <div class="container my-5">
        <h1 class="text-center">Confirmar Pago</h1>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <form method="post" class="d-flex flex-column gap-3 text-center" action="">
                    <div class="form-outline">
                        <label for="invoice_number" class="form-label">Numero de factura</label>
                        <input type="text" class="form-control" name="invoice_number" id="invoice_number" value="<?php echo $invoice_number;?>">
                    </div>
                    <div class="form-outline">
                        <label for="amount" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $amount_due;?>">
                    </div>
                    <div class="form-outline">
                        <select name="payment_method" id="payment_method" class="form-select">
                            <option selected disabled>Seleccionar metodo de Pago</option>
                            <option value="masr_bank">Bancolombia</option>
                            <option value="paypal">Paypal</option>
                            <option value="upi">UPI</option>
                            <option value="cash_on_delivery">Contra Entrega</option>
                        </select>
                    </div>
                    <div class="form-outline">
                        <input type="submit" value="Confirm" name="confirm_payment" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>