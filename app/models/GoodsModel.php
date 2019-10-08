<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'goods';
	protected $primaryKey='g_id';
    public $timestamps= false;
    protected $fillable = ['g_name,g_price,g_huohao,g_num,g_kucun'];
}
