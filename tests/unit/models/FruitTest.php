<?php

namespace tests\unit\models;

use app\models\Fruit;

class FruitTest extends \Codeception\Test\Unit
{
    public function testGetFruits()
    {
        verify($fruits = Fruit::find()->all())->notEmpty();
        //verify($user->username)->equals('admin');
    }

    public function testGetFruitById()
    {
        verify($fruit = Fruit::findOne(23))->notEmpty();
        verify(Fruit::findOne(999))->empty();
    }

    
    public function testGetFavoriteFruits()
    {
        verify($fruits = Fruit::find()->where(['favorite' => 1])->all())->notEmpty();
    }

    public function testSetFavoriteFruit(){
        $fruit=Fruit::findOne(23);
        $fruit->favorite = 1;
        $fruit->save();
        verify($fruit->favorite)->equals(1);
    }

}
