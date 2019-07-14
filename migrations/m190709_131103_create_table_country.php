<?php

use yii\db\Migration;

class m190709_131103_create_table_country extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'iso' => $this->string()->notNull()->comment('ISO'),
            'language_code' => $this->string()->comment('Language Code'),
            'name' => $this->text()->notNull()->comment('Name'),
            'nice_name' => $this->text()->notNull()->comment('Nice Name'),
            'iso3' => $this->string()->comment('ISO3'),
            'num_code' => $this->smallInteger()->comment('Number Code'),
            'phone_code' => $this->integer()->notNull()->comment('Phone Code'),
            'position' => $this->integer()->comment('Position'),
            'status' => $this->string()->notNull()->defaultValue('1'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%country}}');
    }
}
