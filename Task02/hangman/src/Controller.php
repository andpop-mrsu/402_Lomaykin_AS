<?php namespace Yoshaexe\hangman\Controller;
    use function Yoshaexe\hangman\View\showGame;

    function startGame() {
        echo "The game started".PHP_EOL;
        showGame();
    }
?>