<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Collections extends Controller
{
    public function prIndex(){
        return view("collection.payment-records");
    }

    public function pcIndex(){
        return view("collection.payment-collection");
    }


}

