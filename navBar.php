<nav class="mx-auto navbar navbar-expand-lg  navbar-dark bg-dark ">
    <a class="navbar-brand mx-auto btn btn-primary" href="index.php" >Inicio</a>
    <a class="navbar-brand mx-auto btn btn-success" href="perfil.php">Mi Perfíl</a>
    <a class="navbar-brand mx-auto btn btn-secondary" href="contacto.php">Contáctanos</a>
    <a class="navbar-brand mx-auto btn btn-secondary" href="faq.php" >Preguntas Frecuentes</a>
    <div class="navbar-brand mx-auto ">
        <label for="search">Search</label>
        <input type="Search">
        
    </div>
    <div class="navbar-brand mx-auto ">  
        <?php if (isset($_SESSION['username']))
        { 
            echo $_SESSION['username']
        ?>
        <a class="btn btn-secondary" href="logout.php">Logout</a>    
        <?php 
        } 
        ?>
        
    </div>

    <?php     
    if(!isset($_SESSION['username']))
    { ?>
        <a class="navbar-brand mx-auto " href="login.php">Ingreso</a>
        <a class="navbar-brand mx-auto " href="register.php">Registrate</a>
    <?php 
    }
    
    if (isset($_SESSION['username']))
        {
            if ($_SESSION['role'] == 7)
            { ?>
                <div>
                    <a href="admin.php">Administrar</a>
                </div>
            <?php
            }
            ?>
        <?php 
        }
        ?>

</nav>