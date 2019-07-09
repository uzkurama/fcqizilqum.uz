<?php

use yii\db\Migration;

class m190709_131103_create_table_teams extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%teams}}', [
            'id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'logo' => $this->string()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'language_id' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%teams}}');
    }
}
