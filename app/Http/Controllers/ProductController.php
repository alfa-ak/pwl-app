<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // return view('adminlte');
        $data = Product::get();
        return view('product.index', compact('data'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('a');
        $request->validate([
            'name' => 'required',
            'jumlah' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('index.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);

        return view('product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);
        $request->validate([
            'name'   => 'required',
            'jumlah' => 'required',
        ]);

        $data->update($request->all());

        return redirect()->route('index.product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $data->destroy($data->id);

        return redirect()->route('index.product');
    }
}
