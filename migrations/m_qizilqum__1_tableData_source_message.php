<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__1_tableData_source_message
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__1_tableData_source_message extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%source_message}}', 
            ['id', 'category', 'message'],
            [
                [1, 'app', 'Navoiy viloyat turizmni<br>rivojlantirish hududiy<br>boshqarmasi'],
                [2, 'app', 'Bosh sahifa'],
                [3, 'app', 'Qonunchilik'],
                [4, 'app', 'Normativ-hujjatlar'],
                [5, 'app', 'Davlat ramzlari'],
                [6, 'app', 'Yangiliklar'],
                [7, 'app', 'Sayyohlarga'],
                [8, 'app', 'Turistik joylar'],
                [9, 'app', 'Mehmonxonalar'],
                [10, 'app', 'Ovqatlanish maskanlari'],
                [11, 'app', 'Gidlar'],
                [12, 'app', 'Galereya'],
                [13, 'app', 'Hozir Navoiyda'],
                [14, 'app', 'F.I.Sh'],
                [15, 'app', 'Qidirish'],
                [16, 'app', 'Tillar'],
                [17, 'app', 'Tanlash'],
                [18, 'app', 'Davlat manbalari'],
                [19, 'app', 'Aloqa ma\'lumotlari'],
                [20, 'app', 'Barcha huquqlar himoyalangan'],
                [21, 'app', 'Saytdan olingan ma\'lumotlarni chop etganda boshqarma saytiga havola qilish majburiy.'],
                [22, 'app', 'Eng mashhur joylar'],
                [23, 'app', 'So\'nggi yangiliklar'],
                [24, 'app', 'Batafsil'],
                [25, 'app', 'Vaqti'],
                [26, 'app', 'Muallif'],
                [27, 'app', 'So\'nggi normativ-hujjatlar'],
                [28, 'app', 'So\'nggi fotolavha'],
                [29, 'app', 'Agarda sizda savollaring bo\'lsa, murojaat qiling'],
                [30, 'app', 'Telefon raqam'],
                [31, 'app', 'Xabar'],
                [32, 'app', 'Jo\'natish'],
                [33, 'app', 'Ma\'lumotlar manbasi'],
                [34, 'app', 'Hujjat turi'],
                [35, 'app', 'Boshqarma hodimlari'],
                [36, 'app', 'Kontaklar'],
                [37, 'app', 'Mehmonxona turi'],
                [38, 'app', 'Mehmonxona nomi bo\'yicha qidirish'],
                [39, 'app', 'Turi'],
                [40, 'app', 'Ovqatlanish maskani nomi'],
                [41, 'app', 'Chiqish'],
                [42, 'app', 'bir kecha'],
                [43, 'app', 'so\'m'],
                [44, 'app', 'Joylashgan joyi'],
                [45, 'app', 'Boshqarma haqida'],
                [46, 'app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi'],
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
