<?php

namespace Crud\Collection;

use Entity\Genre;
use Tests\CrudTester;
use Entity\Season;
use Entity\Collection\GenreCollecion;

class GenreCollectionCest
{
    public function findAll(CrudTester $I)
    {
        $expectedGenres = [
            ['id' => 1, 'name' => 'Action & Adventure'],
            ['id' => 10, 'name' => 'Animation'],
            ['id' => 4, 'name' => 'Comédie'],
            ['id' => 2, 'name' => 'Crime'],
            ['id' => 3, 'name' => 'Drame'],
            ['id' => 9, 'name' => 'Familial'],
            ['id' => 6, 'name' => 'Mystère'],
            ['id' => 11, 'name' => 'Romance'],
            ['id' => 5, 'name' => 'Science-Fiction & Fantastique'],
            ['id' => 8, 'name' => 'War & Politics'],
            ['id' => 7, 'name' => 'Western'],
        ];
        $genres = GenreCollecion::findAll();
        $I->assertCount(count($expectedGenres), $genres);
        $I->assertContainsOnlyInstancesOf(Genre::class, $genres);

        foreach ($genres as $index => $genre) {
            $expectedGenre = $expectedGenres[$index];
            $I->assertEquals($expectedGenre['id'], $genre->getId());
            $I->assertEquals($expectedGenre['name'], $genre->getName());
        }
    }
}
