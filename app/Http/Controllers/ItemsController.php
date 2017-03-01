<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Mail\BorrowMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $items = Item::orderBy('updated_at', 'desc')->paginate(20);
        return view('items.index', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    public function create(Item $item)
    {
        $categories = Category::all();
        return view('items.create', [ 'categories' => $categories ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ]);

        $item = new Item;

        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->category_id = $request->input('category_id');
        $item->user()->associate(Auth::user());

        if ($request->hasFile('image')) {
            $name = $request->file('image')->store('storage/images');
            $item->image = $name;
        }

        $item->save();

        return redirect()->action('ItemsController@index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->action('ItemsController@index');
    }

    public function showBorrow(Item $item)
    {
        return view('items.borrow', ['item' => $item]);
    }

    public function sendBorrow(Item $item, Request $request)
    {
        Mail::to($request->user())->send(new BorrowMail($item, $request->input('message')));

        return redirect()->back();
    }
}
