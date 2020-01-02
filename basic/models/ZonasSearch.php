<?php

namespace app\models;

use app\models\Zonas;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ZonasSearch represents the model behind the search form of `app\models\Zonas`.
 */
class ZonasSearch extends Zonas
{
    /**
     * @var mixed
     */
    public $claseZona;

    /**
     * @var mixed
     */
    public $zonaRelacionada;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id' /*, 'zona_id'*/], 'integer'],
            [['clase_zona_id', 'nombre', 'claseZona', 'zonaRelacionada', 'zona_id'], 'safe'],
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
     * @param  array                $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Zonas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // Para añadir funciones de ordenamiento
        $dataProvider->setSort([
            'attributes' => [
                'id',
                //'clase_zona_id',

                'claseZona'       => [
                    'asc'     => ['clase_zona_id' => SORT_ASC],
                    'desc'    => ['clase_zona_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'nombre',
                'zonaRelacionada' => [
                    'asc'     => ['nombre' => SORT_ASC],
                    'desc'    => ['nombre' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
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
            //'zona_id' => $this->zona_id,
        ]);
        // Filtro por nombre de clase de zona
        $query->andFilterWhere(['like', 'clase_zona_id', Zonas::getIdZona($this->clase_zona_id)])
              ->andFilterWhere(['like', 'nombre', $this->nombre])
              ->andFilterWhere(['like', 'nombre', $this->zonaRelacionada])
              /*->andFilterWhere(['like', 'claseZona', Zonas::getIdZona($this->clase_zona_id)])*/
              /*->andFilterWhere(['like', 'zona_id', Zonas::getZonaRelacionada($this->zona_id)])*/;
        return $dataProvider;
    }
}
