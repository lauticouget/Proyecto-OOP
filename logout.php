<?php
include('loader.php');
$sessionManager->logout();
header('location:login.php');