<?php
class Player{
    protected $hand; //sert à stocker les cartes ue le joueur possède
    protected $pseudo;
    public function __construct($toto){
        $this->hand = [];
        $this->pseudo = $toto;
    }
    public function take($cards){ //$cards = [Card,Card]
        foreach($cards as $card){
            $this->hand[] = $card;
        }
    }
    public function getHandValue(){
        $panier = 0;
        foreach($this->hand as $card){
            $panier += $card->getValue();
        }
        return $panier;
    }
}