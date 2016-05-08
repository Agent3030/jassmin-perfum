<?php
namespace backend\models;

use common\models\User;
use common\models\UserToken;
use cheatsheet\Time;
use common\commands\SendEmailCommand;


use common\commands\AddToTimelineCommand;
use common\models\query\UserQuery;
use yii\base\Exception;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Create user form
 */
class UserEmailForm extends Model
{
    public $email;
    public $status;
    public $password;
    public $role;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [


            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> '\common\models\User', 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],



        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'roles' => Yii::t('common', 'Roles')
        ];
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;
        $this->role = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function signup()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            print_r($model);
            $model->email = $this->email;
            $model->status = User::STATUS_NOT_ACTIVE;

            $temporaryPassword = Yii::$app->security->generateRandomString(8);
            $model->setPassword($temporaryPassword);


            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            $model->afterSignup();

            $token = UserToken::create(
                $model->getId(),
                UserToken::TYPE_ACTIVATION,
                Time::SECONDS_IN_A_DAY
            );
            Yii::$app->commandBus->handle(new SendEmailCommand([
                'subject' => Yii::t('backend', 'Activation email'),
                'view' => 'activation',
                'params' => [
                    'url' => Url::to(['@frontend/user/sign-in/activation', 'token' => $token->token], true)
                ]
            ]));


            print_r($model);


            return $model;
        }
        return null;
    }
}
