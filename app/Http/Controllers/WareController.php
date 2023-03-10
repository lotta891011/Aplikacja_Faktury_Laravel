<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Ware;
use Illuminate\Http\Request;

class WareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ware = Ware::latest()->paginate(5);
    
        return view('ware.index',compact('ware'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ware.create');
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
            'name' => 'required',
            'symbol' => 'required',
        ]);
    
        Ware::create($request->all());
     
        return redirect()->route('ware.index')
                        ->with('success','Towar dodany pomyślnie.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ware  $ware
     * @return \Illuminate\Http\Response
     */
    public function show(Ware $ware)
    {
        return view('ware.show',compact('ware'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ware  $ware
     * @return \Illuminate\Http\Response
     */
    public function edit(Ware $ware)
    {
        return view('ware.edit',compact('ware'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ware  $ware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ware $ware)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
        ]);
    
        $ware->update($request->all());
    
        return redirect()->route('ware.index')
                        ->with('success','Towar zaktualizowany pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ware  $ware
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ware $ware)
    {
        $ware->delete();
    
        return redirect()->route('ware.index')
                        ->with('success','Towar usunięty pomyślnie.');
    }
}
