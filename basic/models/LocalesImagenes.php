<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales_imagenes".
 *
 * @property string $id
 * @property string $local_id establecimiento/local relacionada
 * @property string $imagen_id Nombre identificativo (fichero interno) con la imagen del establecimiento/local.
 */
class LocalesImagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local_id'], 'required'],
            [['local_id'], 'integer'],
            [['imagen_id'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'local_id' => 'Local ID',
            'imagen_id' => 'Imagen ID',
        ];
    }
}
