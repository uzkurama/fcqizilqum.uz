<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_matches
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_matches extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%matches}}', [
            'id' => $this->integer(11)->notNull(),
            'team_home_id' => $this->integer(11)->notNull(),
            'team_guest_id' => $this->integer(11)->notNull(),
            'team_home_score' => $this->integer(11)->notNull(),
            'team_guest_score' => $this->integer(11)->notNull(),
            'team_home_goals' => $this->text()->notNull(),
            'team_guest_goals' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'stadium' => $this->string(1000)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%matches}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%matches}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
