<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'studentmodels';
	protected $primaryKey='id';
    public $timestamps= false;
    protected $fillable = ['name','age','sex','create_at','update_at'];
    
}
