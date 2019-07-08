<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_message
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_message extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%message}}', [
            'id' => $this->integer(11)->notNull(),
            'language' => $this->string(16)->notNull()->comment('Language'),
            'translation' => $this->text()->null()->comment('Translation'),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%message}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%message}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
