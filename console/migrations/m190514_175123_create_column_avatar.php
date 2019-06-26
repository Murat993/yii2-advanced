<?php

use yii\db\Migration;

/**
 * Class m190514_175123_create_column_avatar
 */
class m190514_175123_create_column_avatar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string('255')->defaultValue(null));
        $this->addColumn('{{%user}}', 'avatar', $this->string('255')->defaultValue(null));
        $this->addColumn('{{%user}}', 'social_photo', $this->string('255')->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'access_token');
        $this->dropColumn('{{%user}}', 'avatar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_175123_create_column_avatar cannot be reverted.\n";

        return false;
    }
    */
}
