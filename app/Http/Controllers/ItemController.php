<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function add_item(Request $request)
    {
        $item = new Item();
        $item->item_name = $request->item_name;

        $item->save();

        return redirect('/');
    }
}
