<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LocalesConvocatorias;
use app\models\Locales;

use app\models\LocalesConvocatoriasAsistentes;

/**
 * LocalesConvocatoriasSearch represents the model behind the search form of `app\models\LocalesConvocatorias`.
 */
class LocalesConvocatoriasSearch extends LocalesConvocatorias
{

    public $titulo;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'local_id', 'num_denuncias', 'bloqueada', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['texto','titulo', 'fecha_desde', 'fecha_hasta', 'fecha_denuncia1', 'fecha_bloqueo', 'notas_bloqueo', 'crea_fecha', 'modi_fecha','titulo'], 'safe'],
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
        $query = LocalesConvocatorias::find();
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
            'local_id' => $this->local_id,
            'fecha_desde' => $this->fecha_desde,
            'fecha_hasta' => $this->fecha_hasta,
            'num_denuncias' => $this->num_denuncias,
            'fecha_denuncia1' => $this->fecha_denuncia1,
            'bloqueada' => $this->bloqueada,
            'fecha_bloqueo' => $this->fecha_bloqueo,
            'crea_usuario_id' => $this->crea_usuario_id,
            'crea_fecha' => $this->crea_fecha,
            'modi_usuario_id' => $this->modi_usuario_id,
            'modi_fecha' => $this->modi_fecha,
            'titulo'=>$this->titulo,
        ]);

        $query->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
            ->andFilterWhere(['like', 'locales.titulo', $this->titulo])
            ;

        return $dataProvider;
    }

    /*public function searchLocalesConvocatoriasDeUsuario2($params,$UserID){
        $query = LocalesConvocatoriasAsistentes::find()->where(['usuario_id'=>$UserID]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }*/


    public function searchLocalesConvocatoriasDeUsuario($params,$UserID){
        $query = LocalesConvocatorias::find()
        ->select('*')
        ->from('locales_convocatorias')
        ->Join('INNER JOIN', 
            'locales_convocatorias_asistentes',
            'locales_convocatorias.local_id=locales_convocatorias_asistentes.local_id')
        ->Join('INNER JOIN', 
            'locales',
            'locales_id=locales_convocatorias_asistentes.local_id')
        ->where(['usuario_id'=>$UserID])

        ;    

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['titulo'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.titulo' => SORT_ASC],
        'desc' => ['locales.titulo' => SORT_DESC],
        ];

        $query->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ;

        return $dataProvider;
    }


     public function searchCreadasPorUsuario($params,$UserID)
    {
        $query = LocalesConvocatorias::find()
        ->select('*')
        ->from('locales')
        ->Join('INNER JOIN', 
            'locales_convocatorias',
            'locales_convocatorias.local_id=locales.id')
        ->where(['locales_convocatorias.crea_usuario_id'=>$UserID])

        ;    

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['titulo'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['locales.titulo' => SORT_ASC],
        'desc' => ['locales.titulo' => SORT_DESC],
        ];

        $query->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'notas_bloqueo', $this->notas_bloqueo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ;

        return $dataProvider;
    }
}
