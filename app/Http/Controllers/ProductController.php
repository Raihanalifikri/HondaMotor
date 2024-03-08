<?php

namespace App\Http\Controllers;

use App\Models\honda;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Product - Index';
        $product = product::all();

        // Return View
        return view('home.product.index', compact(
            'title',
            'product'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Product - Create';

        // Model category
        $honda = honda::all();

        return view('home.product.create', compact(
            'title',
            'honda'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Do Validate
        $this->validate($request,[
            'name' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg|max:5120',
            'color' => 'required',
            'price' => 'required',
            'honda_id' => 'required'
        ]);

        // Aploud image
        $image = $request->file('image');
        $image->storeAs('public/product/', $image->hashName());

        // Create data
        product::create([
            'name' => $request->name,
            'image' => $image->hashName(),
            'color' => $request->color,
            'price' => $request->price,
            'honda_id' => $request->honda_id
        ]);
        
        // Return Redirect
        return redirect()->route('product.index')->with([
            'success' => 'Data has been created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
