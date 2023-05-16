<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Models\Structure;
use Illuminate\Http\Request;

class LineController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:line-list|line-create|line-edit|line-delete', ['only' => ['index','store']]);
         $this->middleware('permission:line-create', ['only' => ['create','store']]);
         $this->middleware('permission:line-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:line-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lines = Line::all();
        return view('lines.index',compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Line $line)
    {
        $orderProducts = $line->products;
        $structures = Structure::all();
        return view('lines.create', compact('structures', 'orderProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Line $line)
    {
        $structures = Structure::findOrFail($request->structure_id);
        $line= $structures -> lines()->create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        foreach ($request->lineProducts as $product) {
            $line->products()->attach($product['product_id'],
                ['cadence' => $product['cadence'], 'uniteprod' => $product['uniteprod'],

            ]);
        }
        return redirect()->route('lines.index')
                        ->with('success','Line created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Line $line)
    {
        $lineProducts = $line->products;
        return view('lines.show',compact('line', 'lineProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $line)
    {
        $structures = Structure::all();
        $line = Line::findOrFail($line);
        return view('lines.edit', compact('structures', 'line'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $line_id)
    {
        // $line = Structure::findOrFail($request->structure_id)
        //             ->lines()->where('id', $line_id)->first();


        // $line->name= $request->name;
        // $line->description = $request->description;
        // $line->update();
        $structure = Structure::findOrFail($request->structure_id);
        $structure->lines()->where('id', $line_id)->update([
            'name'=> $request->name,
            'description'=> $request->description
        ]);
        return redirect()->route('lines.index')
                        ->with('success','Line updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Line $line)
    {
        $line->delete();

        return redirect()->route('lines.index')
                        ->with('success','Line deleted successfully');
    }
}
