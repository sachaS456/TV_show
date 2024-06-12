<?php

namespace Tests\Browse;

use Tests\BrowseTester;

class IndexCest
{
    public function checkAppWebPageHtmlStructure(BrowseTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Séries TV');
        $I->seeElement('.header');
        $I->seeElement('.header h1');
        $I->see('Séries TV', '.header h1');
        $I->seeElement('.content');
        $I->seeElement('.footer');
    }

    public function listAllArtists(BrowseTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Séries TV', 'h1');
        $I->seeElement('.content .list');
        $I->assertEquals(
            [
                'Friends',
                'Futurama',
                'Good Omens',
                'Hunters',
                'La caravane de l\'étrange',
            ],
            $I->grabMultiple('.content .list .tvshow__title')
        );
        // Check if strings are escaped
        $I->seeInSource('le 31 décembre 1999 alors qu&apos;il livrait une pizza,');
    }
}
