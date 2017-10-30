<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_syllabus".
 *
 * @property integer $id
 * @property string $syllabus
 * @property integer $state_id
 */
class SchoolSyllabus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_syllabus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['syllabus'], 'required'],
            [['state_id'], 'integer'],
            [['syllabus'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'syllabus' => 'Syllabus',
            'state_id' => 'State ID',
        ];
    }
}
