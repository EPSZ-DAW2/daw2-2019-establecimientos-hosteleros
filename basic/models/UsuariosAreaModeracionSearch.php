<?php

namespace app\models;

use app\models\UsuariosAreaModeracion;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UsuariosAreaModeracionSearch represents the model behind the search form of `app\models\UsuariosAreaModeracion`.
 */
class UsuariosAreaModeracionSearch extends UsuariosAreaModeracion
{
    /**
     * @var mixed
     */
    public $usuario;

    /**
     * @var mixed
     */
    public $zona;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario', 'zona'], 'safe'],
            [['id', 'usuario_id', 'zona_id'], 'integer'],
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
        $query = UsuariosAreaModeracion::find();

        // add conditions that should always apply here
        $query->joinWith(['usuario', 'zona']);
        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $dataProvider->sort->attributes['usuario'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc'  => ['usuarios.nombre' => SORT_ASC],
            'desc' => ['usuarios.nombre' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['zona'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc'  => ['zonas.nombre' => SORT_ASC],
            'desc' => ['zonas.nombre' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'         => $this->id,
            'usuario_id' => $this->usuario_id,
            'zona_id'    => $this->zona_id,
        ])->andFilterWhere(['like', 'usuarios.nombre', $this->usuario]
        )->andFilterWhere(['like', 'zonas.nombre', $this->zona]);

        return $dataProvider;
    }
}
