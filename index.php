<?php
session_start();
// session_unset();
require_once 'Core/App.php';
require_once 'Core/Controller.php';
require_once 'Core/Database.php';
require_once 'Core/Alert.php';

require_once 'App/Trait/ProductModelGettersSetters.php';
require_once 'App/Trait/VoucherModelGettersSetters.php';


$app = new App();
?>
