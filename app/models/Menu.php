<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
	protected $primaryKey='id';
    public $timestamps= false;
    protected $fillable = ['first_name','second_name','envt','envt_key'];
}
