<?php

namespace Browse;

use Codeception\Example;
use Tests\BrowseTester;

class TVShowEditCest
{
    public function loadNewTVShowFormPage(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php');
        $I->seeResponseCodeIs(200);
        $I->seeInFormFields('form', [
            'id' => '',
            'name' => '',
            'originalName' => '',
            'homepage' => '',
            'posterId' => '',
            'overview' => ''
        ]);
    }

    public function loadExistingTVShowFormPage(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php?TVshowId=3');
        $I->seeResponseCodeIs(200);
        $I->seeInFormFields('form', [
            'id' => '3',
            'name' => 'Friends',
            'originalName' => 'Friends',
            'homepage' => 'https://www.netflix.com/title/70153404',
            'posterId' => '15',
            'overview' => 'Les péripéties de 6 jeunes newyorkais liés par une profonde amitié. Entre amour, travail, famille, ils partagent leurs bonheurs et leurs soucis au Central Perk, leur café favori...'
        ]);
    }

    public function loadTVshowFormWithUnknownTVshowId(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php?TVshowId='.PHP_INT_MAX);
        $I->seeResponseCodeIs(404);
    }


    public function loadTVshowFormWithWrongParameter(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php?TVshowId=');
        $I->seeResponseCodeIs(400);
    }

}
