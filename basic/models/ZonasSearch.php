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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'zona_id'], 'integer'],
            [[/*'zonas',*/'clase_zona_id', 'nombre'], 'safe'],
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
                'clase_zona_id',
                'zonas' => [
                    'asc'     => ['clase_zona_id' => SORT_ASC],
                    'desc'    => ['clase_zona_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'nombre',
                'zona_id',
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
            'id'      => $this->id,
            'zona_id' => $this->zona_id,
        ]);

        $query->andFilterWhere(['like', 'clase_zona_id', Zonas::getIdZona($this->clase_zona_id)])
              ->andFilterWhere(['like', 'nombre', $this->nombre]);
        //Filtrar por clase zona
        //$query->andFilterWhere(['like', 'zonas', Zonas::$this->zonas]);
        return $dataProvider;
    }
}
