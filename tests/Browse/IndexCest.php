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
}