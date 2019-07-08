<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__2_key_language
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__2_key_language extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%language}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%language}}', 'id', 'integer', '', 5);
        $this->runSuccess['fk_language_language_code1_idx'] = $this->createIndex('fk_language_language_code1_idx', '{{%language}}', 'language_code_id', 0);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%language}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%language}}');
            }
        }

    }
}
