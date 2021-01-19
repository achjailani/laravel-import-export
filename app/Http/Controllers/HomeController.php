<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index(){
        return view('web.home',[
            'datas' => Item::all()
        ]);
    }
}
