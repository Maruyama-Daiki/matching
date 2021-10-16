<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
     protected $guarded = array('id');
//Validationでデータが異常であることを見つけたときには、データを保存せずに入力フォームへ戻すようにします。
    public static $rules = array(
        'image_path' => 'required',
        'name' => 'required',
        'gender' => 'required',
    );
    
}
