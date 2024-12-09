<?php
    // fetch all data
    if(isset($_GET['edit_category'])){
        $edit_id = $_GET['edit_category'];
        $get_data_query = "SELECT * FROM `categories` WHERE category_id = $edit_id";
        $get_data_result = mysqli_query($con,$get_data_query);
        $row_fetch_data = mysqli_fetch_array($get_data_result);
        $category_id = $row_fetch_data['category_id'];
        $category_title = $row_fetch_data['category_title'];
    }
    // edit category
    if(isset($_POST['update_category'])){
        $category_title = $_POST['category_title'];
        // check empty fields 
        if(empty($category_title)){
            echo "<script>window.alert('Por Favor llenar todos los campos');</script>";
        }else{
            // update query 
            $update_category_query = "UPDATE `categories` SET category_title='$category_title' WHERE category_id = $edit_id";
            $update_category_result = mysqli_query($con,$update_category_query);
            if($update_category_result){
                echo "<script>window.alert('Categoria Actualizada con Exito');</script>";
                echo "<script>window.open('./index.php?view_categories','_self');</script>";
            }
        }
    }
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Editar Categoria</h1>
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3 mb-3">
                <div class="form-outline">
                    <label for="category_title" class="form-label">Titulo del Producto</label>
                    <input type="text" name="category_title" id="category_title" class="form-control" required value="<?php echo $category_title;?>">
                </div>
                <div class="form-outline text-center">
                    <input type="submit" value="Actualizar Categoria" class="btn btn-primary" name="update_category">
                </div>
            </form>
        </div>
    </div>
</div>