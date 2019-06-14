<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%task_category}}".
 *
 * @property int $id
 * @property int $project_id
 * @property int $name
 *
 * @property Task[] $tasks
 * @property Project $project
 */
class TaskCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%task_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [['project_id'], 'integer'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Проект'),
            'name' => Yii::t('app', 'Название категории'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['task_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TaskCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TaskCategoryQuery(get_called_class());
    }
}
