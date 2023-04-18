<?php

use yii\db\Migration;
use GuzzleHttp\Client;
use yii\db\Schema ;
/**
 * Class m230417_212618_fruits_table
 */
class m230417_212618_fruits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create HTTP client
        $client = new Client();
        $response = $client->get('https://fruityvice.com/api/fruit/all');
        // Parse the JSON response
        $fruits = json_decode($response->getBody(), true);
        $this->createTable('fruits', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'image' => Schema::TYPE_STRING . ' NOT NULL',
            'family' => Schema::TYPE_STRING . ' NOT NULL',
            'order1' => Schema::TYPE_STRING . ' NOT NULL',
            'genus' => Schema::TYPE_STRING . ' NOT NULL',
            'calories' => Schema::TYPE_INTEGER. ' NOT NULL',
            'carbohydrates' => Schema::TYPE_INTEGER. ' NOT NULL',
            'protein' => Schema::TYPE_INTEGER. ' NOT NULL',
            'fat' => Schema::TYPE_INTEGER. ' NOT NULL',
            'sugar' => Schema::TYPE_INTEGER. ' NOT NULL',
            'favorite' => Schema::TYPE_INTEGER. ' NOT NULL'
        ]);

        foreach ($fruits as $fruit) {
            $this->insert('fruits', [
                'name' => $fruit['name'],
                'image' => '',
                'family' => $fruit['family'],
                'order1' =>  $fruit['order'],
                'genus' => $fruit['genus'],
                'calories' =>$fruit['nutritions']['calories'],
                'carbohydrates' => $fruit['nutritions']['carbohydrates'],
                'protein' => $fruit['nutritions']['protein'],
                'fat' => $fruit['nutritions']['fat'],
                'sugar' => $fruit['nutritions']['sugar'],
                'favorite' => 0
            ]
            );
        }

        $this->update('fruits',['favorite' => 1],'id=1');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230417_212618_fruits_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230417_212618_fruits_table cannot be reverted.\n";

        return false;
    }
    */
}
