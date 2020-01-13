<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosteleros".
 *
 * @property string $id
 * @property string $usuario_id Usuario relacionado con los datos principales.
 * @property string $nif_cif Identificador del hostelero.
 * @property string $razon_social Razon social del comercio o NULL si con el "nombre y apellidos" del usuario es suficiente.
 * @property string $telefono_comercio
 * @property string $telefono_contacto
 * @property string $url Dirección web del comercio o NULL si no hay o no se conoce.
 * @property string $fecha_alta Fecha y Hora de alta como hostelero, no como usuario o NULL si no se conoce por algún motivo (que no debería ser).
 */
class Hosteleros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hosteleros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'nif_cif', 'telefono_comercio', 'telefono_contacto'], 'required'],
            [['usuario_id'], 'integer'],
            [['url'], 'string'],
            [['fecha_alta','titulo','descripcion','lugar','FechaCreacion','FechaBloqueo'], 'safe'],
            [['nif_cif'], 'string', 'max' => 12],
            [['razon_social'], 'string', 'max' => 255],
            [['telefono_comercio', 'telefono_contacto'], 'string', 'max' => 25],
            [['nif_cif'], 'unique'],
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
            'nif_cif' => 'Nif Cif',
            'razon_social' => 'Razon Social',
            'telefono_comercio' => 'Telefono Comercio',
            'telefono_contacto' => 'Telefono Contacto',
            'url' => 'Url',
            'fecha_alta' => 'Fecha Alta',
        ];
    }

        public function getlocales(){
            return $this->hasOne(locales::className(),['crea_usuario_id'=>'usuario_id']);   
        }
        
    public static function find()
    {
        return new HostelerosQuery(get_called_class());
    }

}
