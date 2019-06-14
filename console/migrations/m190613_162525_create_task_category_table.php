<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_category}}`.
 */
class m190613_162525_create_task_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_category}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'name' => $this->string(150)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addForeignKey('fx_task_category_project', 'task_category', ['project_id'], 'project', ['id'],'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_task_category_project', 'task_category');
        $this->dropTable('{{%task_category}}');
    }
}
