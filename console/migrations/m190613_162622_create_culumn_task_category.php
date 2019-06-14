<?php

use yii\db\Migration;

/**
 * Class m190613_162622_create_culumn_task_category
 */
class m190613_162622_create_culumn_task_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%task}}', 'task_category_id', $this->integer());

        $this->addForeignKey('fx_task_task_category', 'task', ['task_category_id'], 'task_category', ['id'],'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_task_task_category', 'task');
        $this->dropColumn('{{%task}}', 'task_category_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190613_162622_create_culumn_task_category cannot be reverted.\n";

        return false;
    }
    */
}
