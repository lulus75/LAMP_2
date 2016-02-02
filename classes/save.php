<?php
require_once('deck.php');
require_once('bank.php');

class saveGame{

    public $deck;
    public $player;
    public $bank;
    public $status;

    public function __construct(){
        $this->bank = new Bank();
        $this->deck = new Deck();
        $this->player = new Player('maurice');
        $this->deck->shuffle();
        $this->status = 'Up';
        //$this->hand = 2;
        $this->bank->take($this->deck->deal(2)); //tire 2 cartes du deck, la banque les prends
        $this->player->take($this->deck->deal(2)); //tire 2 cartes du deck, le joueur les prends
    }

}
