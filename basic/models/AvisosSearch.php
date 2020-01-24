<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuariosAvisos;

/**
 * AvisosSearch represents the model behind the search form of `app\models\UsuariosAvisos`.
 */
class AvisosSearch extends UsuariosAvisos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'destino_usuario_id', 'origen_usuario_id', 'local_id', 'comentario_id'], 'integer'],
            [['fecha_aviso', 'clase_aviso_id', 'texto', 'fecha_lectura', 'fecha_aceptado'], 'safe'],
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
        $query = UsuariosAvisos::find();

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
            'fecha_aviso' => $this->fecha_aviso,
            'destino_usuario_id' => $this->destino_usuario_id,
            'origen_usuario_id' => $this->origen_usuario_id,
            'local_id' => $this->local_id,
            'comentario_id' => $this->comentario_id,
            'fecha_lectura' => $this->fecha_lectura,
            'fecha_aceptado' => $this->fecha_aceptado,
        ]);

        $query->andFilterWhere(['like', 'clase_aviso_id', $this->clase_aviso_id])
            ->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }


    public function searchID($params,$PerfilId)
    {
        $query = UsuariosAvisos::find()->where(['origen_usuario_id' => $PerfilId]);

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

        return $dataProvider;
    }
	
    public function searchEnviados($params,$PerfilId)
    {
        $query = UsuariosAvisos::find()->where(['origen_usuario_id' => $PerfilId,"clase_aviso_id"=>"M"]);

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

        return $dataProvider;
    } 
	
	public function searchRecibidos($params,$PerfilId)
    {
        $query = UsuariosAvisos::find()->where(['destino_usuario_id' => $PerfilId,"clase_aviso_id"=>"M"]);

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

        return $dataProvider;
    }


    public function searchIDAvisos($params,$PerfilId,$avisoID,$visto=TRUE)
    {
        if($visto){
            $query = UsuariosAvisos::find()
            ->where(['destino_usuario_id' => $PerfilId,'clase_aviso_id' => $avisoID])
            ->andWhere(['>','fecha_lectura','0']);
            ;
        }else{
            $query = UsuariosAvisos::find()->where(['destino_usuario_id' => $PerfilId,'clase_aviso_id' => $avisoID,'fecha_lectura' => null]);
        }


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

        return $dataProvider;
    }


    public function searchIDAvisosNovistos($params,$PerfilId)
    {

        $query = UsuariosAvisos::find()->where(['destino_usuario_id' => $PerfilId,'fecha_lectura' => null]);
        


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

        return $dataProvider;
    }
}
