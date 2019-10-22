<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';
	protected $primaryKey='id';
    public $timestamps= false;
    protected $fillable = ['mdedia_id','path','type'];
}
