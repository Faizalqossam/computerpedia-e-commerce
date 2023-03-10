<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.store.store', [
            'stores' => Store::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:45',
            'location' => 'required|max:45',
            'rating' => 'required|max:45',
        ]);



        DB::table('store')->insert(
            [
                'name' => $request->name,
                'location' => $request->location,
                'rating' => $request->rating,
            ]
        );

        Alert::success('Added Store Success', 'Data Store Successfully Added');

        return redirect()->route('store.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        return view('admin.store.detail', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.store.edit', [
            'store' => Store::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'location' => 'required|max:45',
            'rating' => 'required',
        ]);

        DB::table('store')->where('id', $id)->update(
            [
                'name' => $request->name,
                'location' => $request->location,
                'rating' => $request->rating,
            ]
        );

        Alert::success('Updated Store Success', 'Data Store Successfully Updated');

        return redirect('admin/store' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::where('id', $id)->delete();
        return response()->json(['status' => 'Data Store Succesfully Deleted']);

        // return redirect()->route('store.index')->with('success', 'Data Store Succesfully Deleted');
    }
}
