<?php

use yii\helpers\Url;

class FruitsCest
{
    public function ensureThatFruitsPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));        
        $I->see('My Company');
        
        $I->seeLink('Favorites');
        $I->click('Favorites');
        $I->wait(2); // wait for page to be opened
        
        $I->see('Calories');
    }
}
