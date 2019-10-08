<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class consignee extends Model
{
    protected $table = 'consignee';
	protected $primaryKey='c_id';
    public $timestamps= false;
    protected $fillable = ['c_name,c_dizhi,c_tel,c_mail,c_phone'];
}
