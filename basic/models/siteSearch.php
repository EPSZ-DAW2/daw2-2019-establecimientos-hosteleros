<?php

namespace app\models;
use Yii;

use yii\base\model;

class siteSearch extends model{
    public $q;
    
    public function rules()
    {
        return [
          ["q", "match", "pattern" => "/^[0-9a-z������\s]+$/i" , "message" => "Solo se aceptan letras y n�meros"],  
        ];
    }
    
    public function attributeLabels(){
        return[
          'q' => "Buscar:",  
        ];
    }
    
}
