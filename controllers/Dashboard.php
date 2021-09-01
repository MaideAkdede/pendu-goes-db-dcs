<?php

namespace Controllers;

class Dashboard
{
    function index()
    {
        require('./utils/letters.php');
        $view = './views/start.php';
        $gameState = 'start';
        $wordsModel = new \Models\Words();
        $wordsCount = random_int(1, $wordsModel->count());

        $_SESSION['word'] = $wordsModel->find($wordsCount);
        $wordName = strtolower($_SESSION['word']->name);
        $wordId = $_SESSION['word']->id;
        //setcookie('wordIndex', $wordsCount = rand(0, $wordsModel->count() -1), time() +3600);
        $lettersCount = strlen($wordName);
        $replaceLetter = str_pad('', $lettersCount, REPLACEMENT_CHAR);
        $trials = 0;
        $triedLetters = [];

        return compact('view', 'gameState', 'wordName', 'lettersCount', 'replaceLetter', 'trials', 'triedLetters' );
    }
}