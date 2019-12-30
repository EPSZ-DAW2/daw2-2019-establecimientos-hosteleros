<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locales_etiquetas".
 *
 * @property int $id
 * @property int $local_id establecimiento/local relacionada
 * @property int $etiqueta_id Etiqueta relacionada.
 */
class LocalesEtiquetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locales_etiquetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local_id', 'etiqueta_id'], 'required'],
            [['local_id', 'etiqueta_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'local_id' => Yii::t('app', 'establecimiento/local relacionada'),
            'etiqueta_id' => Yii::t('app', 'Etiqueta relacionada.'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LocalesEtiquetasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocalesEtiquetasQuery(get_called_class());
    }
}
