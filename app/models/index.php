<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class index extends Model
{
    protected $table = 'index';
	protected $primaryKey='t_id';
    public $timestamps= false;
    protected $fillable = ['t_title','t_man','t_content','t_file'];
}
