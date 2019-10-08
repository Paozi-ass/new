<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class dingdan extends Model
{
    protected $table = 'dingdan';
	protected $primaryKey='d_id';
    public $timestamps= false;
    protected $fillable = ['c_id,price,d_price,d_desc,g_id'];
}
