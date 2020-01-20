<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Zonas]].
 *
 * @see Zonas
 */
class ZonasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Zonas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Zonas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function zonaPadre($id){
        return $this
                ->andWhere(['zona_id' => $id]);
    }
}
