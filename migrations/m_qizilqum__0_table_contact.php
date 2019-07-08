<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__0_table_contact
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__0_table_contact extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%contact}}', [
            'id' => $this->integer(11)->notNull(),
            'tel' => $this->string(500)->null(),
            'email' => $this->string(500)->null(),
            'facebook' => $this->string(500)->null(),
            'instagram' => $this->string(500)->null(),
            'youtube' => $this->string(500)->null(),
            'telegram' => $this->string(500)->null(),
            'mover' => $this->string(500)->null(),
            'lng' => $this->double()->null()->comment('coordinates'),
            'lat' => $this->double()->null()->comment('coordinates'),
            'adress' => $this->json()->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%contact}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%contact}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
