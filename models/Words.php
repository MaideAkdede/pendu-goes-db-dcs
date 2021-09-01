<?php

namespace Models;


class Words extends Model
{

    protected $table = 'words';
    protected $findKey = 'id';

    public function count()
    {
        $wordsCountRequest = 'SELECT count(*) FROM words';
        $pdoSt = $this->pdo->query($wordsCountRequest);
        return $pdoSt->fetchColumn();
    }

    public function find(string $key)
    {
        $wRequest = 'SELECT * FROM words WHERE id = :id';
        $pdoSt = $this->pdo->prepare($wRequest);
        $pdoSt->execute([':id' => $key]);

        return $pdoSt->fetch();
    }
}

