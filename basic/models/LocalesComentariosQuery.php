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
    
    public function bloqueados($local_id){
        
        return $this
                ->andWhere(['like','local_id',$local_id])
                ->andWhere(['!=','bloqueado', 0]);
    }
    
    public function respuestas($comentario_id)
    {
        return $this
                ->andWhere(['like','comentario_id',$comentario_id])
                ->andWhere(['bloqueado' => 0])
                ->orderBy(['crea_fecha'=>SORT_DESC]);
    }
    
    public function valoraciones($local_id){
        return $this
                ->andWhere(['like','local_id',$local_id])
                ->andWhere(['comentario_id' => 0, 'bloqueado'=> 0])
                ->orderBy(['crea_fecha'=>SORT_DESC]);
    }
}
