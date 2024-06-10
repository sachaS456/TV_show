<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Season;
use PDO;

class SeasonCollection
{
    public static function findByTVshowId(int $id)
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM season
    WHERE tvShowId = :tvshowid
    ORDER BY name;
SQL
        );
        $req->execute([':tvshowid' => $id]);
        return $req->fetchAll(PDO::FETCH_CLASS, Season::class);
    }

}
