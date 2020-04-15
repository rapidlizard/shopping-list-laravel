<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class HomeController extends Controller
{
    public function show_shopping_list()
    {
        $items = Item::all();

        return view('shoppinglist', ['items' => $items]);
    }
}
