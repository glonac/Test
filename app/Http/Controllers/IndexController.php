<?php

namespace App\Http\Controllers;

use App\Utils\Human;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request){
        $human = new Human();
        return view('frontend.main');
    }
}
