<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m190616_142937_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'comment' => $this->string(255)->notNull(),
            'level' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(1),
            'project_id' => $this->integer()->null(),
            'task_id' => $this->integer()->null(),
            'task_category_id' => $this->integer()->null(),
            'creator_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('fx_comment_task', 'comment', ['task_id'], 'task', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_comment_project', 'comment', ['project_id'], 'project', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_comment_user', 'comment', ['creator_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_comment_task_category', 'comment', ['task_category_id'], 'task_category', ['id'],'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_comment_task', 'comment');
        $this->dropForeignKey('fx_comment_project', 'comment');
        $this->dropForeignKey('fx_comment_user', 'comment');
        $this->dropForeignKey('fx_comment_task_category', 'comment');
        $this->dropTable('{{%comment}}');
    }
}
