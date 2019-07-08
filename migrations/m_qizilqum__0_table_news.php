<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_news
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_news extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%news}}', [
            'id' => $this->integer(11)->notNull(),
            'title' => $this->string(2000)->notNull(),
            'content' => $this->text()->notNull(),
            'pic' => $this->string(500)->notNull(),
            'date' => $this->date()->notNull()->defaultValue('2019-01-01'),
            'language_id' => $this->integer(11)->notNull(),
            'tags' => $this->string(2000)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%news}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%news}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
