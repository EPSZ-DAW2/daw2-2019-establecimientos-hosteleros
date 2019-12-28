<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zonas".
 *
 * @property int $id
 * @property string $clase_zona_id Código de clase de la zona: 1=Continente, 2=Pais, 3=Estado, 4=Region, 5=Provincia, 6=Municipio, 7=Localidad, 8=Barrio, 9=Area, ...
 * @property string $nombre Nombre de la zona que la identifica.
 * @property int $zona_id Zona relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.
 */
class Zonas extends \yii\db\ActiveRecord
{
    /**
     * @var zonas : Lista fija de clases de zona
     */
    protected static $zonas = [
        1 => 'Continente',
        2 => 'Pais',
        3 => 'Estado',
        4 => 'Región',
        5 => 'Provincia',
        6 => 'Municipio',
        7 => 'Localidad',
        8 => 'Barrio',
        9 => 'Area'];

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'clase_zona_id' => 'Código de clase de la zona',
            'nombre'        => 'Nombre de la zona que la identifica',
            'zona_id'       => 'Zona relacionada',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ZonasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ZonasQuery(get_called_class());
    }

    /**
     * Funcion que devuelve el Id de la clase de zona a partir del nombre
     * @param  [type] $nombre el nombre de la zona
     * @return [type] id si existe ese nombre si no existe
     */
    public static function getIdZona($nombre)
    {
        //Buscamos el nombre en el array
        $id = array_search($nombre, self::$zonas);
        if (isset($id)) {
            return $id;
        }
        return 0; //error
    }

    /**
     * Funcion que devuelve la lista fija de clases de zona
     * @return [array] [las clases de zonas]
     */
    public static function getListaZonas()
    {
        return self::$zonas;
    }

    /**
     * Funcion que devuelve la clase de zona a partir de su id
     * @param  [type] $id el id de la clase de zona
     * @return [type] el nombre de la zona si no existe
     */
    public static function getNombreZona($id)
    {
        if ($id == 0) {
            $nombre = ' ';
        } else {
            $nombre = self::$zonas[$id];

        }
        if (isset($nombre)) {
            return $nombre;
        } else {
            return 0;
        }
    }

    /**
     * @param $nombre
     */
    public function getZonaId($nombre)
    {
        return array_search($nombre, $zonas);
    }

    /**
     * Funcion que devuelve el nombre de la zona relacionada con el zona_id pasado
     * @param  [type] $zona_id el id de la zona relacionada
     * @return [type] el nombre de la zona relacionada
     */
    public function getZonaPadre($zona_id)
    {
        if ($zona_id == 0) {
            return ' ';
        }
        //Buscamos el elemento que este relacionado con el zona id pasado
        $padre = Zonas::findOne($zona_id);
        if (isset($padre)) {
            return $padre->nombre;
        }

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clase_zona_id', 'nombre'], 'required'],
            [['zona_id'], 'integer'],
            [['clase_zona_id'], 'string', 'max' => 1],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zonas';
    }
}
