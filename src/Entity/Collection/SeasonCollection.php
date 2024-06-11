<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Season;
use PDO;

class SeasonCollection
{
    /** Find seasons by TVshowId.
     *
     * @param int $tvShowId
     * @return array: Seasons[]
     */
    public static function findByTVshowId(int $tvShowId): array
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM season
    WHERE tvShowId = :tvshowid
    ORDER BY id;
SQL
        );
        $req->execute([':tvshowid' => $tvShowId]);
        return $req->fetchAll(PDO::FETCH_CLASS, Season::class);
    }

}
