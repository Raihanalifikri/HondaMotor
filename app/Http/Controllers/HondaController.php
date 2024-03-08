<?php

namespace App\Http\Controllers;

use App\Models\honda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HondaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Honda - Index';
        $honda = honda::all();

        return view('home.honda.index', compact(
            'honda',
            'title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Honda - Create';

        return view('home.honda.create', compact(
            'title'
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes: jpeg,png,jpg|max:5048'
        ]);

        // Melakukan Aploud Image
        $image = $request->file('image');
        $image->storeAs('public/honda', $image->hashName());

        // Save ke DB
        honda::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image->hashName()
        ]);

        //Redirect
        return redirect()->route('honda.index')->with('success', 'Data berhasil masuk');
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
        //title
        $title = 'Honda - Edit';

        // Get data by id
        $honda = honda::find($id);

        return view('home.honda.edit', compact(
            'title',
            'honda'
        ));
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
        //Melakukan Validasi
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'image|mimes: jpeg,png,jpg|max:5048'
        ]);

        //get data by id
        $honda = honda::find($id);
        //jika image kosong
        if ($request->file('image') == '') {
            $honda->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->route('honda.index');
        } else {
            // jika gambar ingin di update
            // Hapus image lama
            Storage::disk('local')->delete('public/honda/' .basename($honda->image));
            
            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/honda/', $image->hashName());

            // Update data
            $honda->update([
                'name' => $request->name,
                'slug' => Str::slug( $request->name),
                'image' => $image->hashName()
            ]);

            return redirect()->route('honda.index')
            ->with('update', 'Category Berhasil Di update');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get dadt by id
        $honda = honda::find($id);
        
        // Hapus image lama
        // basename itu untuk mengambil nama file
        Storage::disk('local')->delete('public/honda/' .basename($honda->image));
        
        // Hapus data
        $honda->delete();
        
        // Redirect
        return redirect()->route('honda.index')
        ->with('delete', 'Category Berhasil Di hapus');
    }
}
