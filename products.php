<?php 
require 'loader.php';


if($_POST){
    $productImageErrores=$validator->saveProductImage();
    // dd($productImageErrores);
    if($productImageErrores == []){
        $product=new Product($_POST['name'], $_POST['price'], $_POST['category']);
        $savedProduct= $jsonManager->saveProduct($product);
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once 'head.php';
include_once 'navBar.php';
?>
<body >
<?php
if($sessionManager->adminController()){ ?>
<div class="container">
    <form  class="mt-1 bg-light rounded border border-dark container-fluid" action="" method="post" enctype="multipart/form-data">
        <h1>Ingresar Producto</h1>
        <hr>
            <div class="form-group">
                <label >Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label >Precio $</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label >Categoria</label>
                <select name="category" class="form-control" id="">
                    <option value="toys">Jugetes</option>
                    <option value="food">Comida</option>1
                    <option value="medicine">Medicamentos</option>
                </select>
            </div>
            <div class="form-group">
                <label >Imagen</label>
                <input type="file" class="mb-3 form-control" name="image">
                <?php  
                if(isset($productImageErrores['image'])) { ?>
				<span style="margin-top: 40px" class=" alert alert-danger"><?php echo $productImageErrores['image'] ?> </span>
				<?php } ?>
            </div>
            <div class="form-group form-inline">
                <input type="submit">
                <input type="reset">
                <?php  
                if ($_POST){
                    if($savedProduct['name']== $_POST['name']) { ?>
                        <span style="margin-top: 40px" class=" alert alert-success"><?php echo"El Producto ah sido añadido." ?> </span>
                        <?php } 
                }
                ?>
            </div>
    </form>
</div>
<div class="m-1 container-fluid">
    <div class="row">
        <div class="col-lg-3 ">
                <div class ="card border border-dark">
                    <h1>Cart</h1>
                    <hr>
                    <div class="card-body">Chango
                    <hr>
                    
                        <ul class="list-group">
                            <?php foreach($jsonManager->decodeProducts() as $product) { ?> 
                            <li class="list-tem">
                                <h4> <?php echo $product['name'] ?> </h4>
                                <span class="success"> <?php echo $product['precio']. " $" ?> </span>
                                <div class="container "></div>
                                <img class="card-img-top" src=<?php $imageManager->searchImg($product['imageRoot']) ?> alt="">
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                
        </div>

    </div>
</div>

<?php }
?>
</body>
</html>