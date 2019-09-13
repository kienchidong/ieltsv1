<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function index(){
        if(Gate::allows('kien')){
            echo "hihi";
        }
        else{
            echo "không cho phép";
        }
    }

}
