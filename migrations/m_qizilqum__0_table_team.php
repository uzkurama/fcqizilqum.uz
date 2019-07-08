<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_team
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_team extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%team}}', [
            'id' => $this->integer(11)->notNull(),
            'name' => $this->string(1000)->notNull(),
            'post' => $this->string(500)->notNull(),
            'pic' => $this->string(500)->notNull(),
            'lang_id' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%team}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%team}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
