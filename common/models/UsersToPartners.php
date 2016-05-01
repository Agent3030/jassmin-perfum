<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users_to_partners".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $partner_id
 */
class UsersToPartners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_to_partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'partner_id'], 'required'],
            [['user_id', 'partner_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'partner_id' => 'Partner ID',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(),['id' => 'user_id']);
    }

    public function getPartners()
    {
        return $this->hasMany(Partners::className(),['id' => 'partners_id']);
    }
}
