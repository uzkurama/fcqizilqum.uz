<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_source_message
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_source_message extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%source_message}}', [
            'id' => $this->integer(11)->notNull(),
            'category' => $this->string(32)->notNull()->defaultValue('yii')->comment('Category'),
            'message' => $this->text()->notNull()->comment('Message'),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%source_message}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%source_message}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
