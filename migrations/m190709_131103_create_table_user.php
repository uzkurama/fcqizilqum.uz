<?php

use yii\db\Migration;

class m190709_131103_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'confirmation_token' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue('1'),
            'superadmin' => $this->smallInteger()->defaultValue('0'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'registration_ip' => $this->string(),
            'bind_to_ip' => $this->string(),
            'email' => $this->string(),
            'email_confirmed' => $this->smallInteger()->notNull()->defaultValue('0'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
