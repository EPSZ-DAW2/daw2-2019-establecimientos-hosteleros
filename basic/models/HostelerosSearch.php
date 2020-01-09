<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hosteleros;
use app\models\Locales;
/**
 * HostelerosSearch represents the model behind the search form of `app\models\Hosteleros`.
 */
class HostelerosSearch extends Hosteleros
{
    /**
     * {@inheritdoc}
     */

    public $titulo;
    public $descripcion;
     public $FechaCreacion;
      public $lugar;
      public $FechaBloqueo;

    public function rules()
    {
        return [
            [['id', 'usuario_id'], 'integer'],
            [['nif_cif','razon_social', 'telefono_comercio', 'telefono_contacto', 'url', 'fecha_alta','titulo','descripcion','FechaCreacion','lugar','FechaBloqueo',], 'safe'],
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
        $query = Hosteleros::find();
        $query->joinWith(['locales']);
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
            'usuario_id' => $this->usuario_id,
            'fecha_alta' => $this->fecha_alta,
            //'titulo'=>$this->titulo,
        ]);

        $query->andFilterWhere(['like', 'nif_cif', $this->nif_cif])
            ->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'telefono_comercio', $this->telefono_comercio])
            ->andFilterWhere(['like', 'telefono_contacto', $this->telefono_contacto])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'locales.titulo', $this->titulo])
            ->andFilterWhere(['like', 'locales.descripcion', $this->descripcion])
           // ->andFilterWhere(['like', 'locales.crea_fecha', $this->crea_fecha])
            ->andFilterWhere(['like', 'locales.lugar', $this->lugar])
            ;

        return $dataProvider;
    }


    public function searchID($params,$PerfilId,$terminado)
    {
        $query = Hosteleros::find()
        ->select('*')
        ->joinWith('locales')
        ->where(['=','usuario_id',$PerfilId])
        ->andWhere(['=','terminado',$terminado])
        ;

        
        /*->select('*')
        ->from('hosteleros')
        ->Join('INNER JOIN', 
            'locales',
            'hosteleros.usuario_id=locales.crea_usuario_id')
        ->where(['usuario_id' => $PerfilId])*/
        ;

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

        $dataProvider->sort->attributes['titulo'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.titulo' => SORT_ASC],
        'desc' => ['locales.titulo' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['descripcion'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.descripcion' => SORT_ASC],
        'desc' => ['locales.descripcion' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['lugar'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.titulo' => SORT_ASC],
        'desc' => ['locales.titulo' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['FechaCreacion'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.descripcion' => SORT_ASC],
        'desc' => ['locales.descripcion' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['FechaBloqueo'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.descripcion' => SORT_ASC],
        'desc' => ['locales.descripcion' => SORT_DESC],
        ];


        return $dataProvider;
    }
}
