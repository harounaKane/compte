<?php

class CompteMdl extends ModelGenerique{

    public function update(Compte $compte){
        $query = "UPDATE compte SET solde = :solde, gerant = :gerant WHERE id = :id";

        $tab = [
            "solde"  => $compte->getSolde(),
            "gerant" => $compte->getGerant()->getId_personne(),
            "id"     => $compte->getId()
        ];

        $this->executeReq($query, $tab);
    }

    public function delete(int $id){
        $query = "DELETE FROM compte WHERE id = :id";

        $this->executeReq($query, ["id" => $id]);
    }

    public function updateSolde(Compte $compte){
        $query = "UPDATE compte SET solde = :solde WHERE id = :id";

        $this->executeReq($query, [
            "solde" => $compte->getSolde(), 
            "id"    => $compte->getId()
        ]);
    }

    public function compte(int $id){

        $uMdl = new UserMdl();

        $res = $this->executeReq("SELECT * FROM compte WHERE id = :id", ["id" => $id]);

        extract($res->fetch());

        return new Compte($id, $solde, $uMdl->userById($client), $uMdl->userById($gerant));
    }

    public function compteClient(){

        $uMdl = new UserMdl();

        $res = $this->executeReq("SELECT * FROM compte WHERE client = :id_client", ["id_client" => $this->user()->getId_personne()]);

        extract($res->fetch());

        return new Compte($id, $solde, $this->user(), $uMdl->userById($gerant));
    }

    public function getComptes(){
        
        $uMdl = new UserMdl();

        $res = $this->executeReq("SELECT * FROM compte");

        $tab = [];
        
        while($c = $res->fetch()){
            extract($c);

            $tab[] = new Compte($id, $solde, $uMdl->userById($client), $uMdl->userById($gerant) );
        }
        
        return $tab;
    }
}