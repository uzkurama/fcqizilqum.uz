<?php

use yii\db\Migration;

class m190709_131103_create_table_message extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%message}}', [
            'id' => $this->integer()->notNull(),
            'language' => $this->string()->notNull()->comment('Language'),
            'translation' => $this->text()->comment('Translation'),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%message}}', ['id', 'language']);
    }

    public function down()
    {
        $this->dropTable('{{%message}}');
    }
}
