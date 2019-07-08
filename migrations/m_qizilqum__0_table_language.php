<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_language
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_language extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%language}}', [
            'id' => $this->integer(11)->notNull(),
            'name' => $this->text()->notNull()->comment('Name'),
            'language_code_id' => $this->integer(11)->notNull()->comment('Language Code'),
            'iso_name' => $this->string(100)->notNull(),
            'position' => $this->integer(11)->null()->comment('Position'),
            'status' => "ENUM ('0', '1') NOT NULL DEFAULT '1') COMMENT 'Status'",
            'created_at' => $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')->comment('Created Time'),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%language}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%language}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
