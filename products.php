<?php 
require 'loader.php';

if (isset($_POST['addToCart'])) {
    
    $product= new Product ($_POST['name'], $_POST['price'], $_POST['category'], $_POST['imageExt']);
    $product->setId($_POST['id']);
    $cart->setProducts($product);
    
}

if(isset($_POST['addProduct'])){
    $productImageErrores=$validator->saveProductImage();

    $imageExt=$validator->ImgExt();

    if($productImageErrores == []){

        $product=new Product($_POST['name'], $_POST['price'], $_POST['category'], $imageExt);

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
<!-- INGRESAR NUEVO PRODUCTO -->
<?php
if($sessionManager->adminController()){ ?>
<div class="container">
    <form class="mt-1 bg-light rounded border border-dark container-fluid" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="addProduct">
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
                        if (isset($savedProduct)){
                            if($savedProduct['name']== $_POST['name']) { ?>
                                <span style="margin-top: 40px" class=" alert alert-success"><?php echo"El Producto ah sido añadido." ?> </span>
                                <?php } 
                        }
                    }
                    
                ?>
            </div>
    </form>
</div>

<div class="m-1 container-fluid">
    <div class="row">
    <!-- CARRITO -->
        <div class="col-lg-3 ">
                <div class ="card border border-dark text-center">
                    <h1 class="display-1 ">Cart</h1>
                    <hr>
                    <div class="card-body">Chango
                    <hr>
                        <ul class="list-group">
                            <?php foreach ($cart->getProducts() as $product){  ?>
                                <div class="list-item">
                                    <h1 class="display-5"><?= $product->getName() ?></h1>
                                    <div>
                                        <p><?= $product->getPrice(). " $"?></p>
                                    </div>
                                    <div>
                                        <img src="<?= $product->getImageRoot() ?>" alt="">
                                    </div>
                                    
                                </div>
                            <?php } ?>
                            
                            
                        </ul>
                        
                    </div>
                </div>
                
        </div>
    <!-- Productos -->
        <div class="col-lg-9 ">
                <div class ="card border border-dark text-center">
                    <h1 class="display-1 ">Productos</h1>
                        <ul class="row">
                            <?php foreach($jsonManager->decodeProducts() as $product) {var_dump($product)?> 
                            <li class="col-lg-4 list-item">
                                <div class="card">
                                    <h4> <?php echo $product['name'] ?> </h4>
                                    <div class="card-body">
                                        <span class=""> <?php echo $product['price']. " $" ?> </span>
                                        <img style ="width :5em"class="card-img-top" src="<?= $product['imageRoot'] ?>" >
                                    </div>

                                </div> 
                                <div>
                                        <form action="" method="Post">
                                        <input type="hidden" name="addToCart">
                                            <input name="name" type="hidden" value="<?= $product['name'] ?>">
                                            <input name="price" type="hidden" value=<?= $product['price'] ?>>
                                            <input name="category" type="hidden" value="<?= $product['category'] ?>">
                                            <input name="imageExt" type="hidden" value='<?= $product['imageExt'] ?>'>
                                            <input name="imageRoot" type="hidden" value='<?= $product['imageRoot'] ?>'>
                                            <input name="id" type="hidden" value='<?= $product['id']?>'>
                                            <input class="btn btn-primary" type="submit" value="Add to Cart" >
                                        </form>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                </div>
                
        </div>

    </div>
</div>


<?php }
?>
</body>
</html>