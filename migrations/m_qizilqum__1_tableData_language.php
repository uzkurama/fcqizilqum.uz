<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__1_tableData_language
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__1_tableData_language extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%language}}', 
            ['id', 'name', 'language_code_id', 'iso_name', 'position', 'status', 'created_at'],
            [
                [1, 'O\'zbekcha', 229, 'uz', 1, '1', '2018-11-09 01:50:01'],
                [2, 'English', 225, 'en', 3, '1', '2018-11-09 02:54:33'],
                [3, 'Русский', 177, 'ru', 2, '1', '2018-11-09 03:04:46'],
            ]
        );
        $this->_transaction->commit();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
