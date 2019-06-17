<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $comment
 * @property int $level
 * @property int $status
 * @property int $project_id
 * @property int $task_id
 * @property int $task_category_id
 * @property int $creator_id
 * @property int $updater_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Project $project
 * @property Task $task
 * @property TaskCategory $taskCategory
 * @property User $creator
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['level', 'status', 'project_id', 'task_id', 'task_category_id', 'creator_id', 'updater_id', 'created_at', 'updated_at'], 'integer'],
            [['task_id', 'project_id', 'task_category_id', 'creator_id', 'updater_id', 'created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['task_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskCategory::className(), 'targetAttribute' => ['task_category_id' => 'id']],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'comment' => Yii::t('app', 'Комментарий'),
            'level' => Yii::t('app', 'Level'),
            'status' => Yii::t('app', 'Status'),
            'project_id' => Yii::t('app', 'Project ID'),
            'task_id' => Yii::t('app', 'Task ID'),
            'task_category_id' => Yii::t('app', 'Task Category ID'),
            'creator_id' => Yii::t('app', 'Creator ID'),
            'updater_id' => Yii::t('app', 'Updater ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'creator_id',
                'updatedByAttribute' => 'updater_id'
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskCategory()
    {
        return $this->hasOne(TaskCategory::className(), ['id' => 'task_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CommentQuery(get_called_class());
    }
}
