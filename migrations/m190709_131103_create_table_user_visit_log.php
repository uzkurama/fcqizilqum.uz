<?php

use yii\db\Migration;

class m190709_131103_create_table_user_visit_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_visit_log}}', [
            'id' => $this->primaryKey(),
            'token' => $this->string()->notNull(),
            'ip' => $this->string()->notNull(),
            'language' => $this->char()->notNull(),
            'user_agent' => $this->string()->notNull(),
            'user_id' => $this->integer(),
            'visit_time' => $this->integer()->notNull(),
            'browser' => $this->string(),
            'os' => $this->string(),
        ], $tableOptions);

        $this->createIndex('user_id', '{{%user_visit_log}}', 'user_id');
        $this->addForeignKey('user_visit_log_ibfk_1', '{{%user_visit_log}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_visit_log}}');
    }
}
