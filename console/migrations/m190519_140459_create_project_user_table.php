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
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('fx_project_user_project', 'project_user', ['project_id'], 'project', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_project_user_user', 'project_user', ['user_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_project_user_project', 'project_user');
        $this->dropForeignKey('fx_project_user_user', 'project_user');

        $this->dropTable('{{%project_user}}');
    }
}
