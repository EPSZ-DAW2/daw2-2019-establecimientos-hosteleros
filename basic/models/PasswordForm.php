<?php
    namespace app\models;
   
    use Yii;
    use yii\base\Model;
    use app\models\usuarios;
   
    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
       
        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
       
        public function findPasswords($attribute, $params){
            $IDUsuarioConectado=1;
            $user = usuarios::find()->where([
                'id'=>$IDUsuarioConectado
            ])->one();
            $password = $user->password;
            if($password!=$this->oldpass)
                $this->addError($attribute,'La vieja contraseña es incorrecta');
        }
       
        public function attributeLabels(){
            return [
                'oldpass'=>'Contraseña vieja ',
                'newpass'=>'Contraseña nueva',
                'repeatnewpass'=>'Repite contraseña',
            ];
        }
    }
