<?php

class UserCtl{

    public function userActions(){

        $userMdl = new UserMdl();

        if(isset($_GET['action'])){
            $action = $_GET['action'];

            switch($action){
                case "logout": 
                    session_destroy();
                    header("location: .");
                    exit;

                case "client": 
                    $clients = $userMdl->getUsersByRole("CLIENT");
                    var_dump($clients);//mettre une vue popur l'affichage
                    exit;
            }


        }else if( isset($_POST['signup']) ){
            extract($_POST);

            $p = new Personne(0, $prenom, $login, $mdp, "CLIENT", null);

            $userMdl->inserer($p);
            
        }else if( isset($_POST['signin']) ){
            extract($_POST);

            $userMdl->login($login, $mdp);

            header("location: ?action=compteClient");
            exit;
        }
    }

}