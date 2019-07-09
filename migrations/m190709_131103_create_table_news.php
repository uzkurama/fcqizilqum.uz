<?php

use yii\db\Migration;

class m190709_131103_create_table_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'pic' => $this->string()->notNull(),
            'date' => $this->date()->notNull()->defaultValue('2019-01-01'),
            'language_id' => $this->integer()->notNull(),
            'tags' => $this->string()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
