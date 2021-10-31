<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
     protected $guarded = array('id');
//Validationでデータが異常であることを見つけたときには、データを保存せずに入力フォームへ戻すようにします。
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
    );
    
    // public function news()
    // {
    //     return $this->belongsTo('App\news');
    // }
}
