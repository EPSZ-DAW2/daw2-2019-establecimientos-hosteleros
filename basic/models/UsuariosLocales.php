<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_locales".
 *
 * @property int $id
 * @property int $usuario_id Usuario relacionado, seguidor del establecimiento/local.
 * @property int $local_id establecimiento/local relacionado.
 * @property string $fecha_alta Fecha y Hora de activación del seguimiento del establecimiento/local por parte del usuario.
 */
class UsuariosLocales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_locales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'local_id', 'fecha_alta'], 'required'],
            [['usuario_id', 'local_id'], 'integer'],
            [['fecha_alta'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'local_id' => 'Local ID',
            'fecha_alta' => 'Fecha Alta',
            'descripcion'=>'descripcion',
        ];
    }
}
