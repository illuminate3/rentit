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
        $this->middleware('auth', ['except' => ['index', 'categoryIndex', 'show']]);
    }

    public function index()
    {
        $items = Item::orderBy('updated_at', 'desc')->paginate(12);
        $categories = Category::all();
        
        return view('items.index', [
            'items' => $items,
            'categories' =>  $categories,
            'category' => null,
        ]);
    }

    public function categoryIndex(Category $category)
    {
        $items = Item::where('category_id', $category->id)->paginate(12);
        $categories = Category::all();

        return view('items.index', [
            'items' => $items,
            'categories' =>  $categories,
            'category' => $category,
        ]);
    }

    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item
        ]);
    }

    public function create(Item $item)
    {
        return view('items.create', [
            'categories' => Category::all()
        ]);
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
        $item->price = $request->input('price');
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
        if ($item->user == Auth::user()) {
            $item->delete();
        }

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
