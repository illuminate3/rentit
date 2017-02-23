<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact($items));
    }

    public function show(Item $item)
    {
        return view('projects.show', [
            'item' => $project,
            'edit' => false
        ]);
    }
}
