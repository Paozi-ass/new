<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Eventcontroller extends Controller
{
    public function event()
    {
        echo $_GET['echostr'];
    }
}
