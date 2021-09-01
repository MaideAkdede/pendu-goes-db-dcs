<?php


namespace Controllers;

class Trials
{
    function store()
    {
        $gameState = 'start';
        $lettersCount = strlen($_SESSION['word']->name);
        $triedLetter = $_POST['triedLetter'];
        $replaceLetter = str_pad('', $lettersCount, REPLACEMENT_CHAR);
        $wordName =  strtolower($_SESSION['word']->name);


        $_SESSION['letters'][$triedLetter] = false;
        $triedLetters = array_filter($_SESSION['letters'], fn($b) => !$b);
        $trials = count(array_filter(array_keys($triedLetters), fn($l) => !str_contains($wordName, $l)));
        $letterFound = false;

        //
        for ($i = 0; $i < $lettersCount; $i++) {
            $replaceLetter[$i] = array_key_exists($wordName[$i], $triedLetters) ? $wordName[$i] : REPLACEMENT_CHAR;
            if ($triedLetter === substr($wordName, $i, 1)) {
                $letterFound = true;
            }
        }
        $serializedLetters = urlencode(serialize($_SESSION['letters'])); // en get et en post
        setcookie('letters', urlencode(serialize($_SESSION['letters'])), time() + 3600);
        $triedLettersStr = implode(', ', array_keys($triedLetters));
        //
        if (!$letterFound) {
            if (MAX_TRIALS <= $trials) {
                $gameState = 'lost';
            }
        } else {
            if ($_SESSION['word'] === $replaceLetter) {
                $gameState = 'win';
            }
        }
        return compact('trials', 'replaceLetter', 'triedLetters', 'lettersCount', 'triedLettersStr', 'gameState');
    }
}