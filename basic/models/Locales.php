<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales".
 *
 * @property int $id
 * @property string $titulo Titulo corto o slogan para el establecimiento/local.
 * @property string $descripcion Descripción breve del establecimiento/local o NULL si no es necesaria.
 * @property string $lugar Descripcion del lugar del establecimiento/local o NULL si no se conoce, aunque no debería estar vacío este dato.
 * @property string $url Dirección web externa (opcional) que enlaza con la página "oficial" o directamente del establecimiento/local o NULL si no hay o no se conoce.
 * @property int $zona_id Area/Zona de ubicación del establecimiento/local o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property int $categoria_id Categoria de clasificación del establecimiento/local o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property string $imagen_id Nombre identificativo (fichero interno) con la imagen principal o "de presentación" del establecimiento/local, o NULL si no hay.
 * @property int $sumaValores Suma acumulada de las valoraciones para el establecimiento/local.
 * @property int $totalVotos Contador de votos (valoraciones) emitidas para el establecimiento/local.
 * @property int $hostelero_id Hostelero/Propietario del establecimiento/local o CERO si no está patrocinado por nadie o no existe, o aún no está indicado (como si fuera NULL).
 * @property int $prioridad Indicador de importancia para el establecimiento/local en caso de tener hostelero.
 * @property int $visible Indicador de establecimiento/local visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.
 * @property int $terminado Indicador de establecimiento/local terminado o suspendido: 0=No, 1=Realizada, 2=Suspendida, 3=Cancelada por Inadecuada, ...
 * @property string $fecha_terminacion Fecha y Hora de terminación del establecimiento/local. Debería estar a NULL si no está terminada.
 * @property int $num_denuncias Contador de denuncias del establecimiento/local o CERO si no ha tenido.
 * @property string $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueado Indicador de establecimiento/local bloqueada: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...
 * @property string $fecha_bloqueo Fecha y Hora del bloqueo del establecimiento/local. Debería estar a NULL si no está bloqueado o si se desbloquea.
 * @property string $notas_bloqueo Notas visibles sobre el motivo del bloqueo del establecimiento/local o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 * @property int $cerrado_comentar Indicador de establecimiento/local cerrado para comentarios: 0=No, 1=Si.
 * @property int $cerrado_quedar Indicador de establecimiento/local cerrado para quedadas: 0=No, 1=Si.
 * @property int $crea_usuario_id Usuario que ha creado el establecimiento/local o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string $crea_fecha Fecha y Hora de creación del establecimiento/local o NULL si no se conoce por algún motivo.
 * @property int $modi_usuario_id Usuario que ha modificado el establecimiento/local por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string $modi_fecha Fecha y Hora de la última modificación del establecimiento/local o NULL si no se conoce por algún motivo.
 * @property string $notas_admin Notas adicionales para los moderadores/administradores sobre el establecimiento/local o NULL si no hay.
 */
class Locales extends \yii\db\ActiveRecord
{
	/**
     * @var clasesBloqueo : Lista fija de clases de Bloqueo
     */
    protected static $clasesBloqueo = [
        0 => 'No',
        1 => 'Si (Bloqueado por denuncias)',
        2 => 'Si (Bloqueado por administrador)'];
		
	/**
     * @var clasesEstadosTerminacion : Lista fija de clases de estados de terminacion
     */
    protected static $clasesEstadosTerminacion = [
        0 => 'No',
        1 => 'Relizada',
        2 => 'Suspendida',
		3 => 'Cancelada por inadecuada'];
		
		
		
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo', 'descripcion', 'lugar', 'url', 'notas_bloqueo', 'notas_admin'], 'string'],
            [['zona_id', 'categoria_id', 'sumaValores', 'totalVotos', 'hostelero_id', 'prioridad', 'visible', 'terminado', 'num_denuncias', 'bloqueado', 'cerrado_comentar', 'cerrado_quedar', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['fecha_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
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
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'lugar' => 'Lugar',
            'url' => 'Url',
            'zona_id' => 'Zona ID',
            'categoria_id' => 'Categoria ID',
            'imagen_id' => 'Imagen ID',
            'sumaValores' => 'Suma Valores',
            'totalVotos' => 'Total Votos',
            'hostelero_id' => 'Hostelero ID',
            'prioridad' => 'Prioridad',
            'visible' => 'Visible',
            'terminado' => 'Terminado',
            'fecha_terminacion' => 'Fecha Terminacion',
            'num_denuncias' => 'Num Denuncias',
            'fecha_denuncia1' => 'Fecha Denuncia1',
            'bloqueado' => 'Bloqueado',
            'fecha_bloqueo' => 'Fecha Bloqueo',
            'notas_bloqueo' => 'Notas Bloqueo',
            'cerrado_comentar' => 'Cerrado Comentar',
            'cerrado_quedar' => 'Cerrado Quedar',
            'crea_usuario_id' => 'Crea Usuario ID',
            'crea_fecha' => 'Crea Fecha',
            'modi_usuario_id' => 'Modi Usuario ID',
            'modi_fecha' => 'Modi Fecha',
            'notas_admin' => 'Notas Admin',
        ];
    }
    
     public static function find()
    {
        return new LocalesQuery(get_called_class());
    }
	
	/**
     * Funcion que devuelve la lista fija de clases de bloqueo
     * @return [array] [las clases de bloqueo]
     */
    public static function getListaClasesBloqueo()
    {
        return self::$clasesBloqueo;
    }
    
	/**
     * Funcion que devuelve la lista fija de clases de estados de terminacion
     * @return [array] [las clases de estados de terminacion]
     */
    public static function getListaClasesEstadosTerminacion()
    {
        return self::$clasesEstadosTerminacion;
    }
}
