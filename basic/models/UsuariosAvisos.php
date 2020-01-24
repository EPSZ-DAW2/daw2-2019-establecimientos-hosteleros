<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_avisos".
 *
 * @property int $id
 * @property string $fecha_aviso Fecha y Hora de creación del aviso.
 * @property string $clase_aviso_id código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, B=Bloqueo, M=Mensaje Genérico,...
 * @property string $texto Texto con el mensaje de aviso.
 * @property int $destino_usuario_id Usuario relacionado, destinatario del aviso, o NULL si no es para administración y aún no está gestionado.
 * @property int $origen_usuario_id Usuario relacionado, origen del aviso, o NULL si es del sistema.
 * @property int $local_id establecimiento/local relacionado o NULL si no tiene que ver directamente.
 * @property int $comentario_id Comentario relacionado o NULL si no tiene que ver directamente con un comentario.
 * @property string $fecha_lectura Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.
 * @property string $fecha_aceptado Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.
 */
class UsuariosAvisos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public static function listaAvisos(){
		return array(
		["id"=>"N", "nombre"=>"Notificacion"],
		["id"=>"A", "nombre"=>"Aviso"],
		["id"=>"D", "nombre"=>"Denuncia"],
		["id"=>"C", "nombre"=>"Consulta"],
		["id"=>"B", "nombre"=>"Bloqueo"],
		["id"=>"M", "nombre"=>"Mensaje"],
		["id"=>"L", "nombre"=>"Log"],
		);
	}
	public static function tipoAviso($tipo)
	{
		switch ($tipo) {
                case 'N':
                    return "Notificacion";
                case 'A':
                    return "Aviso";
                case 'D':
                    return "Denuncia";
                case 'C':
                    return "Consulta";
                case 'B':
                    return "Bloqueo";
                case 'M':
                    return "Mensaje Genérico";
                case 'L':
                    return "Log";
				default:
					return "Desconocido";
		}
	}
    public static function tableName()
    {
        return 'usuarios_avisos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_aviso'], 'required'],
            [['fecha_aviso', 'fecha_lectura', 'fecha_aceptado'], 'safe'],
            [['texto'], 'string'],
            [['destino_usuario_id', 'origen_usuario_id', 'local_id', 'comentario_id'], 'integer'],
            [['clase_aviso_id'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_aviso' => 'Recibido el',
            'clase_aviso_id' => 'Tipo',
            'texto' => 'Texto',
            'destino_usuario_id' => 'Destino',
            'origen_usuario_id' => 'Origen',
            'local_id' => 'Establecimiento',
            'comentario_id' => 'Comentario',
            'fecha_lectura' => 'Leido el',
            'fecha_aceptado' => 'Aceptado el',
        ];
    }
}
