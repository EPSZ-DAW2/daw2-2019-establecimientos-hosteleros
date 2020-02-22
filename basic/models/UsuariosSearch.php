<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * AvisosSearch represents the model behind the search form of `app\models\UsuariosAvisos`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nick', 'nombre', 'apellidos', 'confirmado'], 'required'],
            [['fecha_nacimiento', 'fecha_registro', 'fecha_acceso', 'fecha_bloqueo'], 'safe'],
            [['direccion', 'notas_bloqueo'], 'string'],
            [['zona_id', 'confirmado', 'num_accesos', 'bloqueado'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nick'], 'string', 'max' => 25],
            [['nombre'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 100],
            [['email'], 'unique'],
            [['nick'], 'unique'],
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
            'email ' => $this->email,//Como este
            
        ]);

        $query->andFilterWhere(['like', 'clase_aviso_id', $this->clase_aviso_id])//Como filtrar o buscar datos
            ->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }


    public function login($params,$email,$password)
    {
        $query = Usuarios::find()->where(['email' => $email,
                                        'password'=> $password]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([//Manejador que conecta con la base de datos
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
