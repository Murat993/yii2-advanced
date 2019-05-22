<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190519_140441_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'project_id' => $this->integer()->null(),
            'executor_id' => $this->integer()->null(),
            'started_at' => $this->integer()->null(),
            'completed_at' => $this->integer()->null(),
            'creator_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('fx_user_task1_1', 'task', ['executor_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_user_task1_2', 'task', ['creator_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_user_task1_3', 'task', ['updater_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_project_task', 'task');
        $this->dropForeignKey('fx_user_task1_1', 'task');
        $this->dropForeignKey('fx_user_task1_2', 'task');
        $this->dropForeignKey('fx_user_task1_3', 'task');
        $this->dropTable('{{%task}}');
    }
}
