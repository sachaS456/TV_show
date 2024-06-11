<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Season;
use Entity\Genre;
use PDO;

class GenreCollecion
{
    /**
     * Method you use to get all the Genres.
     * @return array
     */
    public static function findAll(): array
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
            SELECT * 
            FROM genre
SQL
        );
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, Genre::class);
    }


}
