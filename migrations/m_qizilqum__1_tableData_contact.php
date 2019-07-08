<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__1_tableData_contact
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__1_tableData_contact extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%contact}}', 
            ['id', 'tel', 'email', 'facebook', 'instagram', 'youtube', 'telegram', 'mover', 'lng', 'lat', 'adress'],
            [
                [1, '+998913322545', 'info@fcqizilqum.uz', 'https://facebook.com/fcqizilqum', 'https://instagram.com/fcqizilqum', 'https://youtube/fcqizilqum', 'https://telegram.org/fcqizilqum', 'https://mover.uz/fcqizilqum', '123', '123', '[{"adress_text": "Umid stadioni", "adress_language": "1"}, {"adress_text": "Stadium Umid", "adress_language": "2"}, {"adress_text": "Стадион Умид", "adress_language": "3"}]'],
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
