<?php

use yii\helpers\Url;

class FavoritesCest
{
    public function ensureThatFavoritesWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/favorite'));
        $I->see('Calories');
    }
}
