<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    //Validationでデータが異常であることを見つけたときには、データを保存せずに入力フォームへ戻すようにします。
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        'image' => 'required',
    );
}
