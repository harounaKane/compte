<?php
session_start();

include "classes/Personne.php";
include "classes/Compte.php";

include "controller/UserCtl.php";
include "controller/CompteCtl.php";

include "model/ModelGenerique.php";
include "model/CompteMdl.php";
include "model/UserMdl.php";



//include "vue/header.php";
$userCtl = new UserCtl();
$compteCtl = new CompteCtl();

$userCtl->userActions();
$compteCtl->compteAction();

if( !isset($_GET['action']) ){
    include "vue/signUp.php";
}

//include "vue/footer.php";
