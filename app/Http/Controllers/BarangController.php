<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return response()->json($barang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $validatedData = $request->validate([
            'nama_pengirim' => 'required|string',
            'nama_barang' => 'required|string',
            'alamat' => 'required|string',
        ]);

        try{
            $item = Barang::create($validatedData);
            return response()->json(["msg" => "berhasil membuat barang"], 201);
        }
        catch(\Exception $e){
            return response()->json(['error' => "Cant Create Item"], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StorebarangRequest $request)
    {
        try{
            $barang = Barang::findorfail($request->id);
            return response()->json($barang);
        }
        catch(\Exception $e){
            return response()->json(["msg" => "id tidak ditemukan"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreBarangRequest $request)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request)
    {
        $validateData = $request->validate([
            'nama_pengirim' => 'required|string',
            'nama_barang' => 'required|string',
            'alamat' => 'required|string',
        ]);

        try{
            $barang = Barang::findOrFail($request->id);
            $barang->update($validateData);
            return response()->json(["msg" => "Barang Berhasil di Edit"]);
        }
        catch(\Exception $e){
            return response()->json(["error" => $e->getMessage()], 404);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreBarangRequest $request)
    {
        try{
            // $barang = Barang::findorfail($request->id);
            // $barang->delete();
            Barang::destroy($request->id);
            return response()->json(["msg" => "berhasil"]);
            
        }
        catch(\Exception $e){
            return response()->json(["error" => $e->getMessage()], 404);
        }
    }
}
