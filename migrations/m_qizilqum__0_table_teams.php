<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_teams
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_teams extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%teams}}', [
            'id' => $this->integer(11)->notNull(),
            'name' => $this->string(500)->notNull(),
            'logo' => $this->string(500)->notNull(),
            'region_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%teams}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%teams}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
