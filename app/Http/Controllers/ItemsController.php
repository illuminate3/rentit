<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::paginate(20);
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('items.show', compact($item));
    }
}
