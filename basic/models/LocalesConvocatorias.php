<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales_convocatorias".
 *
 * @property int $id
 * @property int $local_id establecimiento/local relacionado
 * @property string $texto El texto de la convocatoria.
 * @property string $fecha_desde Fecha y Hora de inicio de la convocatoria o NULL si no se conoce (mostrar próximamente).
 * @property string $fecha_hasta Fecha y Hora de finalización de la convocatoria o NULL si no se conoce (no caduca automáticamente).
 * @property int $num_denuncias Contador de denuncias de la convocatoria o CERO si no ha tenido.
 * @property string $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueada Indicador de convocatoria bloqueada: 0=No, 1=Si(bloqueada por denuncias), 2=Si(bloqueada por administrador), ...
 * @property string $fecha_bloqueo Fecha y Hora del bloqueo de la convocatoria. Debería estar a NULL si no está bloqueada o si se desbloquea.
 * @property string $notas_bloqueo Notas visibles sobre el motivo del bloqueo de la convocatoria o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 * @property int $crea_usuario_id Usuario que ha creado la convocatoria o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string $crea_fecha Fecha y Hora de creación de la convocatoria o NULL si no se conoce por algún motivo.
 * @property int $modi_usuario_id Usuario que ha modificado la convocatoria por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string $modi_fecha Fecha y Hora de la última modificación de la convocatoria o NULL si no se conoce por algún motivo.
 */
class LocalesConvocatorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales_convocatorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local_id', 'texto'], 'required'],
            [['local_id', 'num_denuncias', 'bloqueada', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['texto', 'notas_bloqueo'], 'string'],
            [['fecha_desde','convocatoria_id', 'fecha_hasta', 'fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
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
            //'titulo'=> 'titulo',
            'texto' => 'Texto',
            'fecha_desde' => 'Fecha Desde',
            'fecha_hasta' => 'Fecha Hasta',
            'num_denuncias' => 'Num Denuncias',
            'fecha_denuncia1' => 'Fecha Denuncia1',
            'bloqueada' => 'Bloqueada',
            'fecha_bloqueo' => 'Fecha Bloqueo',
            'notas_bloqueo' => 'Notas Bloqueo',
            'crea_usuario_id' => 'Crea Usuario ID',
            'crea_fecha' => 'Crea Fecha',
            'modi_usuario_id' => 'Modi Usuario ID',
            'modi_fecha' => 'Modi Fecha',
            //'titulo'=>'titulo',
        ];
    }

    public function getlocales_convocatorias_asistentes(){
        return $this->hasOne(LocalesConvocatoriasAsistentes::className(),['locales_convocatorias_asistentes.local_id' => 'local_id']);
    }
    public function getlocales(){
        return $this->hasOne(locales::className(),['locales.id'=>'local_id']);    }
}
