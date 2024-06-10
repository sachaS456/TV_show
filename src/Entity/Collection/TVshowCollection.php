<?php
declare(strict_types=1);

namespace Entity\Collection;
use Database\MyPdo;
use Entity\TVshow;

use PDO;
class TVshowCollection
{
    /**
     * Méthode qui retourne un tableau contenant tous les tvshows triés par ordre alphabétique
     *
     * @return TVshow[]|false
     */
    public static function findAll():array|false
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM tvshow
    ORDER BY name
SQL
        );
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, TVshow::class);
    }
}