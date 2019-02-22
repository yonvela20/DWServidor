<?php

namespace app\controllers;
use yii\rest\ActiveController;
 
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
 
  public function actionAuthenticate(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Si se envían los datos en formato raw dentro de la petición http, se recogen así:
        $params=json_decode(file_get_contents("php://input"), false);
        @$username=$params->username;
        @$password=$params->password;
        // Si se envían los datos de la forma habitual (form-data), se reciben en $_POST:
        $username=$_POST['username'];
        $password=$_POST['password' ];
        
        if($u=\app\models\User::findOne(['usuario'=>$username]))
            if($u->password==md5($password)) {//o crypt, según esté en la BD
    
                return ['token'=>$u->token,'id'=>$u->id,'nombre'=>$u->nombre];
            }
    
        return ['error'=>'Usuario incorrecto. '.$username];
        }
    }
}