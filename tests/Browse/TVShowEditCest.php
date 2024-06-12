<?php

namespace Browse;

use Codeception\Example;
use Tests\BrowseTester;

class TVShowEditCest
{
    public function loadNewTvShowFormPage(BrowseTester $I)
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

    public function loadExistingTvShowFormPage(BrowseTester $I)
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

    public function loadTvshowFormWithUnknownTvshowId(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php?TVshowId='.PHP_INT_MAX);
        $I->seeResponseCodeIs(404);
    }


    public function loadTvshowFormWithWrongParameter(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php?TVshowId=');
        $I->seeResponseCodeIs(400);
    }

    public function insertTvshow(BrowseTester $I)
    {
        $I->stopFollowingRedirects();
        $I->amOnPage('/admin/tvshow-form.php');
        $I->submitForm('form', [
            'id' => '1230000',
            'name' => 'NVSERIE',
            'originalName' => 'NVSERIE',
            'homepage' => 'www.COOL.com',
            'posterId' => '2340042303424230',
            'overview' => 'Une série vachement cool'
        ]);
        $I->seeInCurrentUrl('/admin/tvshow-save.php');
        $I->seeResponseCodeIs(302);
    }

    public function insertTvshowWithMissingName(BrowseTester $I)
    {
        $I->amOnPage('/admin/tvshow-form.php');
        $I->submitForm('form', ['name' => '']);
        $I->seeInCurrentUrl('/admin/tvshow-save.php');
        $I->seeResponseCodeIs(400);
    }
    /**
     * @depends loadExistingTvShowFormPage
     */
    public function updateTvshow(BrowseTester $I)
    {
        $I->stopFollowingRedirects();
        $I->amOnPage('/admin/tvshow-form.php?TVshowId=3');
        $I->submitForm('form', [
            'id' => '1230000',
            'name' => 'NVSERIE',
            'originalName' => 'NVSERIE',
            'homepage' => 'www.COOL.com',
            'posterId' => '2340042303424230',
            'overview' => 'Une série vachement cool'
        ]);
        $I->seeInCurrentUrl('/admin/tvshow-save.php');
        $I->seeResponseCodeIs(302);
    }
}
