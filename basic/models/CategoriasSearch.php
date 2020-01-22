<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categorias;

/**
 * CategoriasSearch represents the model behind the search form of `app\models\Categorias`.
 */
class CategoriasSearch extends Categorias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoria_id'], 'integer'],
            [['nombre', 'descripcion', 'icono'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Categorias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'icono', $this->icono]);

        return $dataProvider;
    }

    public function obtenerHijo($id){

        //Creamos el array
            $hijos = array();

        //Comprobamos si tiene hijos

            if(Categorias::find()->where(['categoria_id'=>$id])->count()>0){

                //Almacenamos las filas de los hijos
                    $resultado = Categorias::find()->where(['categoria_id'=>$id])->all();

                //Cogemos solo los id

                    foreach ($resultado as $key => $value) {

                        array_push($hijos, $value['id']);
                        
                    }
            }

        return $hijos;

    }//fin funcion obtener hijo

    public function arbolCategorias($categorias, $i){

        $prueba = array();

        //Calculamos la longitud del array
            $l = count($categorias);

        if($l == $i){

            return $categorias;

        }else{

        //Comprobamos si hemos llegado o no al final del array
            //if($l !== $i){//si no hemos llegado al final

                //Indicamos cual es el id padre
                    $id = $categorias[$i];

                //Obtenemos los hijos
                    $resultado = self::obtenerHijo($id);

                if($resultado == NULL){

                    $resultado = array();
                }

                //Creamos el nuevo array
                   $categorias = array_merge($categorias,$resultado);

                //Incrementamos el contador
                    $i++;

                //Llamamos recursivamente
                    return array_merge(self::arbolCategorias($categorias, $i), $prueba);

            }
    }//fin funcion arbol categorias
}
