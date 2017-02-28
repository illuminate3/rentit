<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::paginate(20);
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    public function create(Item $item)
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $item = new Item;

        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->user()->associate(Auth::user());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path('images/items/');
            $name = sha1(time()) . '.' . $image->getClientOriginalExtension();
            $image->move($path, $name);

            $item->image = $path . $name;
        }

        $item->save();

        return redirect()->back();
    }
}
