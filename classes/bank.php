<?php
require_once('player.php');
require_once('save.php');
require_once('card.php');
class Bank extends Player{
    public function __construct(){
        parent::__construct("Banque");
    }
}

