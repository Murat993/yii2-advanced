<?php

use yii\db\Migration;

/**
 * Class m190519_141329_create_foreignkeys
 */
class m190519_141329_create_foreignkeys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_project_task', 'task', ['project_id'], 'project', ['id'], 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_user_task1_1', 'task', ['executor_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_user_task1_2', 'task', ['creator_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_user_task1_3', 'task', ['updater_id'], 'user', ['id'],'RESTRICT', 'CASCADE');

        $this->addForeignKey('fx_project_user1_1', 'project', ['creator_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_project_user1_2', 'project', ['updater_id'], 'user', ['id'],'RESTRICT', 'CASCADE');

        $this->addForeignKey('fx_project_user_project', 'project_user', ['project_id'], 'project', ['id'],'RESTRICT', 'CASCADE');
        $this->addForeignKey('fx_project_user_user', 'project_user', ['user_id'], 'user', ['id'],'RESTRICT', 'CASCADE');
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

        $this->dropForeignKey('fx_project_user1_1', 'project');
        $this->dropForeignKey('fx_project_user1_2', 'project');

        $this->dropForeignKey('fx_project_user_project', 'project_user');
        $this->dropForeignKey('fx_project_user_user', 'project_user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190519_141329_create_foreignkeys cannot be reverted.\n";

        return false;
    }
    */
}
