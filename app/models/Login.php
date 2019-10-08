<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'logins';
	protected $primaryKey='id';
    public $timestamps= false;
    protected $fillable = ['username','password','tel'];
}
