<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hosteleros]].
 *
 * @see Hosteleros
 */
class HostelerosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[usuario_id]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Hosteleros[]|array
     */
    
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Hosteleros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function hostelero($id){
        return $this->andWhere(['usuario_id' => $id]);
    }
}
