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
            'imageFileName' => app('system')->imageFileName,
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        $filename = "";
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads';
                $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  
                $filename = '/uploads' . '\\' . $filename;
                
            }                
        }

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

            if($request->hasFile('imageFileName')) {
                $file = $request->file('imageFileName');
                if($file) {
                    $destinationPath = public_path()  . '/uploads';
                    $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);  
                    $filename = '/uploads' . '\\' . $filename;
                    $soiltypes->imageFileName = $filename;
                }                
            }
            
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



