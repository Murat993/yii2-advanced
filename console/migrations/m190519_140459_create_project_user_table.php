<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_user}}`.
 */
class m190519_140459_create_project_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_user}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => "ENUM('manager', 'developer', 'tester')",
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_user}}');
    }
}
