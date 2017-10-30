<?php
/**
 * Created by PhpStorm.
 * User: owshi
 * Date: 23/10/17
 * Time: 10:31 PM
 */

namespace app\models;
use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
          [['name','email'],'required'],
            ['email','email'],
        ]; // TODO: Change the autogenerated stub
    }
}