<?php

namespace Tests\Crud\Collection;

use Tests\CrudTester;
use Entity\TVshow;
use Entity\Collection\TVshowCollection;

class TVshowCollectionCest
{
    public function findAll(CrudTester $I)
    {
        $expectedtvShows = [
            ['id' => 3, 'name' => 'Friends'],
            ['id' => 25, 'name' => 'Futurama'],
            ['id' => 40, 'name' => 'La caravane de l\'étrange'],
            ['id' => 57, 'name' => 'Good Omens'],
            ['id' => 70, 'name' => 'Hunters'],
        ];

        $tvshows = TVshowCollection::findAll();
        $I->assertCount(count($expectedtvShows), $tvshows);
        $I->assertContainsOnlyInstancesOf(TVshow::class, $tvshows);

        foreach ($tvshows as $index => $tvshow) {
            $expectedtvShow = $expectedtvShows[$index];
            $I->assertEquals($expectedtvShow['id'], $tvshow->getId());
            $I->assertEquals($expectedtvShow['name'], $tvshow->getName());
        }
    }

}