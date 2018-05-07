<?php

namespace App\Http\Controllers;
use App\SoilType;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SoilTypesController extends Controller
{
    public function index() {

        $soiltypes = Soiltype::where('systemID', app('system')->id)->get();
        return view('soiltypes.index', compact('soiltypes'));
    }

    public function create() {

        return view('soiltypes.create');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        $newsoiltypes = Soiltype::create([
            'soilType' => $request['soilType'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('soiltypes');
    }
    public function edit($id) 
    {
        $soiltypes = Soiltype::find($id);
        return view('soiltypes.edit')->with('soiltype', $soiltypes);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $soiltypes = Soiltype::find($request['id']);
        
            $soiltypes->soilType = $request['soilType'];
            $soiltypes->comments = $request['comments'];
            
            $soiltypes->updated_at = Carbon::now()->toDateTimeString();
            $soiltypes->save();
            return redirect('soiltypes');
    }

    /**
     * Display a page to delete a new planttype
     *
     */
    public function destroy($id) 
    {
        Soiltype::destroy($id);

        $soiltypes = Soiltype::where('systemID', app('system')->id)->get();
        return view('soiltypes.index', compact('soiltypes'));
    }

}



