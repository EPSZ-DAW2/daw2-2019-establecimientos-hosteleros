<?php

namespace app\models;
use yii\data\ActiveDataProvider;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $username;
    public $authKey;
    public $accessToken;
    public $admin;
    public $LayoutPerfil;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nick', 'nombre', 'apellidos', 'confirmado'], 'required'],
            [['fecha_nacimiento', 'fecha_registro', 'fecha_acceso', 'fecha_bloqueo'], 'safe'],
            [['direccion', 'notas_bloqueo'], 'string'],
            [['zona_id', 'confirmado', 'num_accesos', 'bloqueado', 'privilegios'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nick'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 100],
            [['email'], 'unique'],
            [['nick'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'nick' => 'Nick',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'direccion' => 'Direccion',
            'zona_id' => 'Zona ID',
            'fecha_registro' => 'Fecha Registro',
            'confirmado' => 'Confirmado',
            'fecha_acceso' => 'Fecha Acceso',
            'num_accesos' => 'Num Accesos',
            'bloqueado' => 'Bloqueado',
            'fecha_bloqueo' => 'Fecha Bloqueo',
            'notas_bloqueo' => 'Notas Bloqueo',
            'privilegios'=>'Privilegios',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['id' => $id]),
        ]);

        $models=$dataProvider->getModels();
        if(count($models)>0)
        {
            return $models[0];       
        }else
        {
            return NULL;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($nick)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['nick' => $nick]),
        ]);

        $models=$dataProvider->getModels();
        if(count($models)>0)
        {
            $models[0]->username=$nick;
            return $models[0];       
        }else
        {
            return NULL;
        }

    }
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
