<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_country
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_country extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%country}}', [
            'id' => $this->integer(11)->notNull(),
            'iso' => $this->string(2)->notNull()->comment('ISO'),
            'language_code' => $this->string(10)->null()->comment('Language Code'),
            'name' => $this->text()->notNull()->comment('Name'),
            'nice_name' => $this->text()->notNull()->comment('Nice Name'),
            'iso3' => $this->string(3)->null()->comment('ISO3'),
            'num_code' => $this->smallInteger(6)->null()->comment('Number Code'),
            'phone_code' => $this->integer(5)->notNull()->comment('Phone Code'),
            'position' => $this->integer(11)->null()->comment('Position'),
            'status' => "ENUM ('0', '1') NOT NULL DEFAULT '1'",
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%country}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%country}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
