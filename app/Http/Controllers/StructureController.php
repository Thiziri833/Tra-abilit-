<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStructureRequest;
use App\Models\Line;

class StructureController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:structure-list|structure-create|structure-edit|structure-delete', ['only' => ['index','store']]);
         $this->middleware('permission:structure-create', ['only' => ['create','store']]);
         $this->middleware('permission:structure-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:structure-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = Structure::all();
        return view('structures.index',compact('structures'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('structures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Structure::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('structures.index')
                        ->with('success','Structure created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        return view('structures.show',compact('structure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        return view('structures.edit',compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $structure = Structure::find($id);

       $structure->name = $request->input('name');

       $structure->save();

       return redirect()->route('structures.index')
                        ->with('success','Structure updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $structure_id)
    {
        $structure = Structure::findOrFail($structure_id);
        $structure->lines()->delete();
        // $structure->users()->delete();
        $structure->delete();
        return redirect()->route('structures.index')
                        ->with('success','Structure deleted successfully with all its lines');

    }
}
