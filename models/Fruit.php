<?php

namespace app\models;

use Yii;

class Fruit extends \yii\db\ActiveRecord   
{   
    /**  
     * @inheritdoc  
     */   
    public static function tableName()   
    {   
        return 'fruits';   
    }   
       
}  