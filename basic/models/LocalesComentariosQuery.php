<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LocalesComentarios]].
 *
 * @see LocalesComentarios
 */
class LocalesComentariosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LocalesComentarios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LocalesComentarios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function respuestas($comentario_id){
        return $this
                ->andWhere(['like','comentario_id',$comentario_id])
                ->orderBy(['crea_fecha'=>SORT_DESC]);
    }
}
