<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $request->user()->merchant->items()->paginate();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('item.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category' => ['required', 'string'],
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category;

        if ($request->file('img')) {
            $filePath = $request->file('img')->store('items', 'public');
            $item->img = $filePath;
        }

        $request->user()->merchant->items()->save($item);

        return redirect()->to(route('item.index'))->with('success', 'Berhasil mengedit data item');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $category = Category::all();
        return view('item.form', compact('category', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category' => ['required', 'string'],
        ]);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category;

        if ($request->file('img')) {
            $filePath = $request->file('img')->store('items', 'public');
            $item->img = $filePath;
        }

        $item->save();

        return redirect()->to(route('item.index'))->with('success', 'Berhasil mengedit data item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->to(route('item.index'))->with('success', 'Berhasil menghapus item');
    }
}
