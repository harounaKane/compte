<?php 

class Personne{
    private $id_personne;
    private $prenom;
    private $login;
    private $mdp;
    private $role;
    private $dateInscription;

    public function __construct( $id_personne,  $prenom,  $login,  $mdp,  $role,  $dateInscription){
        $this->id_personne = $id_personne;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->dateInscription = $dateInscription;
    }
	

    public function setId_personne( $id_personne): void {
        $this->id_personne = $id_personne;
    }

	public function setPrenom( $prenom): void {
        $this->prenom = $prenom;
    }

	public function setLogin( $login): void {
        $this->login = $login;
    }

	public function setMdp( $mdp): void {
        $this->mdp = $mdp;
    }

	public function setRole( $role): void {
        $this->role = $role;
    }

	public function setDateInscription( $dateInscription): void {
        $this->dateInscription = $dateInscription;
    }

	

    public function getId_personne() {return $this->id_personne;}

	public function getPrenom() {return $this->prenom;}

	public function getLogin() {return $this->login;}

	public function getMdp() {return $this->mdp;}

	public function getRole() {return $this->role;}

	public function getDateInscription() {return $this->dateInscription;}

	
}