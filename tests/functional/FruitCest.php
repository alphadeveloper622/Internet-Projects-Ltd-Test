<?php
use yii\base\Module;

class FruitCest
{
    public function sendAjax(\FunctionalTester $I)
    {
        $I->amOnPage('index-test.php?site/index');
        $I->sendAjaxPostRequest(\yii\helpers\Url::to(['/site/set-favorite']),['id' => '23','flag'=>true]);
        $I->seeResponseCodeIs(200);
    }

    
}