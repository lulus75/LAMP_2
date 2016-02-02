<?php

require_once('classes/save.php');
require_once('index.php');

//SCENARIO 1

session_start();
    if(isset($_POST['reset'])){
        unset($_SESSION['game']);
    }

if(!isset($_SESSION['game'])){
    $game= new saveGame();
    $_SESSION['deck'] = serialize($game);
} else{
    $game = unserialize($_SESSION['game']);
}

if(isset($_POST['hit'])){
    if($game->player->getHandValue() <=21 && $game->status != 'finish'){
        echo '<br>vous piochez une carte<br>';
        $game->player->take($game->deck->deal(1));
    }
}
if($game->player->getHandValue() > 21){
    echo'vous avez perdu avec : '.$game->player->getHandValue();
}else{
    echo'vous avez :'.$game->player->getHandValue();
}

if(isset($_POST['pass'])){;
    echo ('<br>vous passez');
    $game->status = 'finish';
    while($game->bank->getHandValue()<17){
        $game->bank->take($game->deck->deal(1));


    }if($game->bank->getHandValue()< $game->player->getHandValue() && $game->player->getHandValue()<= 21){
        echo '<br>La banque perd avec :' .$game->bank->getHandValue().'<br>Vous gagnez avec :'.$game->player->getHandValue();
    }

}

if($game->bank->getHandValue() > 21 && $game->player->getHandValue() <= 21 && $game->status == 'finish'){
    echo '<br>La banque perd avec :' .$game->bank->getHandValue().'<br>Vous gagnez avec :'.$game->player->getHandValue();
}
else if($game->bank->getHandValue() == $game->player->getHandValue ()  && $game->status == 'finish'){
    echo '<br>Egalite';
}
else if($game->bank->getHandValue() > $game->player->getHandValue() && $game->bank->getHandValue() <= 21 && $game->status == 'finish'){
    echo '<br>La banque gagne avec :'.$game->bank->getHandValue(). '<br> vous perdez avec :'.$game->player->getHandValue();
}else{
    echo '<br> La banque a : '.$game->bank->getHandValue();
}

$_SESSION['game'] = serialize($game);
