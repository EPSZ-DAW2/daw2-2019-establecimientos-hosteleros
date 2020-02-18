<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LocalesConvocatoriasAsistentes;

/**
 * LocalesConvocatoriasAsistentesSearch represents the model behind the search form of `app\models\LocalesConvocatoriasAsistentes`.
 */
class LocalesConvocatoriasAsistentesSearch extends LocalesConvocatoriasAsistentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'local_id', 'convocatoria_id', 'usuario_id'], 'integer'],
            [['fecha_alta'], 'safe'],
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
        $query = LocalesConvocatoriasAsistentes::find();

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
            'local_id' => $this->local_id,
            'convocatoria_id' => $this->convocatoria_id,
            'usuario_id' => $this->usuario_id,
            'fecha_alta' => $this->fecha_alta,
        ]);

        return $dataProvider;
    }
}
