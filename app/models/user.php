<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
	protected $primaryKey='uid';
    public $timestamps= false;
    protected $fillable = ['uname','qrcode','share_num'];
}
