<?php

namespace App\Http\Controllers;

use App\Planter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlantersController extends Controller
{
    public function index() {

        $planters = Planter::where('systemID', app('system')->id)->get();
        return view('planters.index', compact('planters'));
    }

    public function create() {

        return view('planters.create');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        $newplanters = Planter::create([
            'PlanterType' => $request['PlanterType'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('planters');
    }
    public function edit($id) 
    {
        $planter = Planter::find($id);
        return view('planters.edit')->with('planter', $planter);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $planter = Planter::find($request['id']);
        
            $planter->PlanterType = $request['PlanterType'];
            $planter->comments = $request['comments'];
            
            $planter->updated_at = Carbon::now()->toDateTimeString();
            $planter->save();
            return redirect('planters');
    }

    /**
     * Display a page to delete a new planttype
     *
     */
    public function destroy($id) 
    {
        Planter::destroy($id);

        $planters = Planter::where('systemID', app('system')->id)->get();
        return view('planters.index', compact('planters'));
    }


}
