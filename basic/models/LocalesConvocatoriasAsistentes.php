<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales_convocatorias_asistentes".
 *
 * @property int $id
 * @property int $local_id establecimiento/local relacionado
 * @property int $convocatoria_id convocatoria relacionada
 * @property int $usuario_id usuario relacionado que asistira a la convocatoria.
 * @property string $fecha_alta Fecha y Hora de creación de la asistencia a la convocatoria o NULL si no se conoce por algún motivo.
 */
class LocalesConvocatoriasAsistentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales_convocatorias_asistentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local_id', 'convocatoria_id'], 'required'],
            [['local_id', 'convocatoria_id', 'usuario_id'], 'integer'],
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
            'local_id' => 'Local ID',
            'convocatoria_id' => 'Convocatoria ID',
            'usuario_id' => 'Usuario ID',
            'fecha_alta' => 'Fecha Alta',
        ];
    }

    
}
