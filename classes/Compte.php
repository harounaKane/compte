<?php

class Compte{
    private int $id;
    private float $solde;
    private Personne $client;
    private Personne $gerant;

    public function __construct(int $id, float $solde, Personne $client, Personne $gerant){
        $this->id = $id;
        $this->solde = $solde;
        $this->client = $client;
        $this->gerant = $gerant;
    }

    public function deposer(float $montant){
        $this->solde += $montant;
    }

    public function retirer(float $montant){
        if( $montant <= $this->solde ){
            $this->solde -= $montant;
        }
    }

    public function viverVers(Compte $compteDest, $montant){
        if( $montant <= $this->solde ){
            $this->retirer($montant);
            $compteDest->deposer($montant);
        }
    }
	

    public function setId(int $id): void {$this->id = $id;}

	public function setSolde(float $solde): void {$this->solde = $solde;}

	public function setClient(Personne $client): void {$this->client = $client;}

	public function setGerant(Personne $gerant): void {$this->gerant = $gerant;}

	

    public function getId(): int {return $this->id;}

	public function getSolde(): float {return $this->solde;}

	public function getClient(): Personne {return $this->client;}

	public function getGerant(): Personne {return $this->gerant;}

	
}