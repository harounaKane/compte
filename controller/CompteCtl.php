<?php

class CompteCtl{
    public function compteAction(){

        $compteMdl = new CompteMdl();
        $userMdl = new UserMdl();

        if( isset($_GET['action']) ){
            switch($_GET['action']){
                case "compteClient": 

                    $compte = $compteMdl->compteClient();

                    if( isset($_POST['montant']) ){
                        switch($_POST["type"]){
                            case "depot": 
                                $compte->deposer($_POST['montant']);
                                $compteMdl->updateSolde($compte);
                                break;

                            case "retrait": 
                                $compte->retirer($_POST['montant']);
                                $compteMdl->updateSolde($compte);
                                break;
                                
                            case "virer": 
                                $compteDest = $compteMdl->compte($_POST['compteDest']);
                                
                                $compte->viverVers($compteDest, $_POST['montant']);
                                $compteMdl->updateSolde($compte);
                                $compteMdl->updateSolde($compteDest);

                                break;
                        }

                        header("location: ?action=compteClient" );
                        exit;
                    }

                    $comptes = $compteMdl->getComptes();

                    include "vue/compteClient.php";
                    break;

                case "compte": 
                    if( !$this->isConnected()){
                        header('location: .');
                        exit;
                    }

                    $comptes = $compteMdl->getComptes();
                    include "vue/gestionCompte.php";
                    
                    break;
                
                case "delete": 
                    $id = $_GET['id'];
                    $compteMdl->delete($id);

                    header('location: ?action=compte');
                    exit;
                
                case "update": 

                    $id = $_GET['id'];
                    $compteToUpdate = $compteMdl->compte($id);

                    if( isset($_POST['solde'])){
                        $gerant = $userMdl->userById($_POST['gerant']);
                        $compteToUpdate->setSolde($_POST['solde']);
                        $compteToUpdate->setGerant($gerant);

                        $compteMdl->update($compteToUpdate);    
                        
                        
                        header('location: ?action=compte');
                        exit;
                    }


                    $listeGerant = $userMdl->getUsersByRole("GERANT");

                    include "vue/formCompte.php";


            }
        }
    }

    function isConnected(){
        return isset($_SESSION['user']) ? true : false;
    }

    function isAdmin(){
        return $this->isConnected() && 
                        unserialize($_SESSION['user'])->getRole() == "GERANT" 
                        ? true 
                        : false;
    }
}