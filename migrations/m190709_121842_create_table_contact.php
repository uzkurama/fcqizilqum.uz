<?php

use yii\db\Migration;

class m190709_121842_create_table_contact extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'tel' => $this->string(),
            'email' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),
            'youtube' => $this->string(),
            'telegram' => $this->string(),
            'mover' => $this->string(),
            'lng' => $this->double()->comment('coordinates'),
            'lat' => $this->double()->comment('coordinates'),
            'adress' => $this->json(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%contact}}');
    }
}
