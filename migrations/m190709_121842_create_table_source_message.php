<?php

use yii\db\Migration;

class m190709_121842_create_table_source_message extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%source_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string()->notNull()->defaultValue('yii')->comment('Category'),
            'message' => $this->text()->notNull()->comment('Message'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%source_message}}');
    }
}
