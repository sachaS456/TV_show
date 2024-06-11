<?php

namespace Tests\Crud\Collection;

use Tests\CrudTester;
use Entity\Season;
use Entity\Collection\SeasonCollection;

class SeasonCollectionCest
{
    public function findByTvshowId(CrudTester $I)
    {
        $expectedShowTvs = [
            ['id' => 208, 'name' => 'Épisodes spéciaux', 'tvShowId' => 25, 'seasonNumber' => 2147483647, 'posterId' => 232],
            ['id' => 209, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 233],
            ['id' => 210, 'name' => 'Saison 2', 'tvShowId' => 25, 'seasonNumber' => 2, 'posterId' => 234],
            ['id' => 211, 'name' => 'Saison 3', 'tvShowId' => 25, 'seasonNumber' => 3, 'posterId' => 235],
            ['id' => 212, 'name' => 'Saison 4', 'tvShowId' => 25, 'seasonNumber' => 4, 'posterId' => 236],
            ['id' => 213, 'name' => 'Saison 5', 'tvShowId' => 25, 'seasonNumber' => 5, 'posterId' => 237],
            ['id' => 214, 'name' => 'Saison 6', 'tvShowId' => 25, 'seasonNumber' => 6, 'posterId' => 238],
            ['id' => 215, 'name' => 'Saison 7', 'tvShowId' => 25, 'seasonNumber' => 7, 'posterId' => 239],
        ];

        $seasons = SeasonCollection::findByTVshowId(25);
        $I->assertCount(8, $seasons);
        $I->assertContainsOnlyInstancesOf(Season::class, $seasons);
        foreach ($seasons as $index => $season) {
            $expectedShowTv = $expectedShowTvs[$index];
            $I->assertEquals($expectedShowTv['id'], $season->getId());
            $I->assertEquals($expectedShowTv['name'], $season->getName());
            $I->assertEquals($expectedShowTv['tvShowId'], $season->getTvShowId());
            $I->assertEquals($expectedShowTv['seasonNumber'], $season->getSeasonNumber());
            $I->assertEquals($expectedShowTv['posterId'], $season->getPosterId());
        }
    }

}
