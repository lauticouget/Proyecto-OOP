<?php
include('loader.php');
include('head.php');
include_once('navBar.php');



if(!$sessionManager->adminController())
    {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<body class="container-fluid">
<?php
if(file_get_contents('users.json')!= "")
    {?>
    <div class="container">
        <h1  class="display-5">Usuarios</h1>
            <?php 
            foreach($jsonManager->decodeUsers() as $user)
                {
                ?>
                <form action="eraseUser.php" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h1 href="#" class="btn btn-primary"><?php echo $user['username'];?></h1>
                                <input type="hidden" name="eraseUser" value="<?php echo $user['username'] ?> ">
                                <input  type="submit" value="Eliminar"  class="float-right btn btn-danger"> 
                            </div>
                        </li>
                    </ul>
                </form>
                <?php 
                }
            ?>
                    
    </div>
<?php } 
if(file_get_contents('deleted.users.json')!= "")
    {?>
        <div class="container">
            <h2  class="display-6">Eliminados</h2>
        <?php
        foreach(decodeDeletedUsers() as $deletedUser)
            {
            ?>
            <form action="restoreUser.php" method="post">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <h1 href="#" class="btn btn-primary"><?php echo $deletedUser['username'];?></h1>
                            <input type="hidden" name="restoreUser" value="<?php echo $deletedUser['username'] ?> ">
                            <input  type="submit" value="restaurar"  class="float-right btn btn-danger"> 
                        </div>
                    </li>
                </ul>
            </form>
            <?php 
            }
            ?>
            </div>
            <?php
    }

?>
        
    </body>

</html>