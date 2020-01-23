<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Locales]].
 *
 * @see Locales
 */
class LocalesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Categorias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Categorias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    //Funcion para realizar la busqueda simple
    public function busqueda($texto){

        //En esta busqueda simple, se podra buscar por el titulo, la descripcion
        //del local o por su lugar.

        return $this
            ->andWhere(['visible' => 1,'terminado' => 0, 'bloqueado' => 0])
            ->andWhere(['like', 'titulo', $texto])
            ->orWhere(['like', 'descripcion', $texto])
            ->orWhere(['like', 'lugar', $texto])
            ->orderBy(['prioridad'=>SORT_DESC, 'id'=>SORT_DESC]);
    }


    public function busquedaAvanzada($titulo, $descripcion, $lugar, $url, $sumaValores){

        //En esta busqueda simple, se podra buscar por el titulo, la descripcion
        //del local o por su lugar.

        return $this
            ->andWhere(['visible' => 1,'terminado' => 0, 'bloqueado' => 0])
            ->andWhere(['like', 'titulo', $titulo])
            ->andWhere(['like', 'descripcion', $descripcion])
            ->andWhere(['like', 'lugar', $lugar])
            ->andWhere(['like', 'url', $url])
            ->andWhere(['like', 'sumaValores', $sumaValores])
            ->orderBy(['prioridad'=>SORT_DESC, 'id'=>SORT_DESC]);
    }


    //Funcion para listar todos los locales que puede ver el publico, es decir los locales
    //visibles
    public function publico(){

        return $this
            ->andWhere(['visible' => 1,'terminado' => 0, 'bloqueado' => 0])
            ->orderBy(['prioridad'=>SORT_DESC, 'id'=>SORT_DESC]);
    }


    //Funcion para realizar la busqueda simple por categoria
    public function categoria($id){

        return $this
            ->andWhere(['visible' => 1,'terminado' => 0, 'bloqueado' => 0])
            ->andWhere(['categoria_id' => $id])
            ->orderBy(['prioridad'=>SORT_DESC, 'id'=>SORT_DESC]);
    }



    public function categoriasTotales($categorias){

        $res = $this->andWhere(['visible' => 1,'terminado' => 0, 'bloqueado' => 0]);

        $i = 0;

        foreach($categorias as $k => $v){

            if($i == 0){

                $res->andWhere(["categoria_id"=>$v]);
                $i++;

            }else{

                $res->orWhere(["categoria_id"=>$v]);

            }

            
        }

        //$res->orderBY(['nombre'=>SORT_ASC]);

        return $res;
    }
    
}
