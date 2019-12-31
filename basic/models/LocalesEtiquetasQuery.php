<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LocalesEtiquetas]].
 *
 * @see LocalesEtiquetas
 */
class LocalesEtiquetasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LocalesEtiquetas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LocalesEtiquetas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
