<?php

use yii\db\Migration;

class m190709_121842_create_table_language extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull()->comment('Name'),
            'language_code_id' => $this->integer()->notNull()->comment('Language Code'),
            'iso_name' => $this->string()->notNull(),
            'position' => $this->integer()->comment('Position'),
            'status' => $this->string()->notNull()->defaultValue('1')->comment('Status'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Created Time'),
        ], $tableOptions);

        $this->createIndex('fk_language_language_code1_idx', '{{%language}}', 'language_code_id');
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }
}
