<?php

use yii\db\Migration;

class m190709_121842_create_table_matches extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%matches}}', [
            'id' => $this->primaryKey(),
            'team_home_id' => $this->integer()->notNull(),
            'team_guest_id' => $this->integer()->notNull(),
            'team_home_score' => $this->integer()->notNull(),
            'team_guest_score' => $this->integer()->notNull(),
            'team_home_goals' => $this->text()->notNull(),
            'team_guest_goals' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'stadium' => $this->string()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%matches}}');
    }
}
