<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\web\Link;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $active
 * @property int $creator_id
 * @property int $updater_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $creator
 * @property User $updater
 * @property ProjectUser[] $projectUsers
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    const RELATION_PROJECT_CREATOR = 'creator';
    const RELATION_PROJECT_UPDATER = 'updater';
    const RELATION_PROJECT_PROJECT_USER = 'projectUsers';
    const RELATION_PROJECT_TASKS = 'tasks';

    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const STATUSES_LABELS = [
      self::STATUS_NOT_ACTIVE => 'неактивный',
      self::STATUS_ACTIVE => 'активный',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description',], 'required'],
            [['description'], 'string'],
            [[ 'creator_id', 'updater_id', 'created_at'], 'safe'],
            [['active', 'creator_id', 'updater_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
            [['updater_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updater_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Имя проекта'),
            'description' => Yii::t('app', 'Описание проекта'),
            'active' => Yii::t('app', 'Активный'),
            'creator_id' => Yii::t('app', 'Создатель проекта'),
            'updater_id' => Yii::t('app', 'Обновитель проекта'),
            'created_at' => Yii::t('app', 'Дата создания'),
            'updated_at' => Yii::t('app', 'Дата обновления'),
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
            'saveRelations' => [
                'class'     => SaveRelationsBehavior::class,
                'relations' => [self::RELATION_PROJECT_PROJECT_USER]
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }

    public static function getStatusProject($status)
    {
        return ArrayHelper::getValue(self::STATUSES_LABELS, $status);
    }

    public static function getProjectUser($user)
    {
        return ArrayHelper::getValue(User::find()->select('username')->indexBy('id')->column(), $user);
    }

    public function getUsersRoles()
    {
        return $this->getProjectUsers()->select('role')->indexBy('user_id')->column();
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProjectQuery(get_called_class());
    }
}
