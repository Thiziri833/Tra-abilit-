<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\Printing;
use App\Models\Production;
use App\Models\Product;
use App\Models\Structure;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:production-list|production-create|production-edit|production-delete', ['only' => ['index','show']]);
         $this->middleware('permission:production-create', ['only' => ['create','store']]);
         $this->middleware('permission:production-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:production-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = Production::latest()->paginate(5);
        return view('Productions.index',compact('productions'))
        ->with('i', (request()->input('page', 1) - 1) * 5);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $structures = Structure::all();
        $lines = Line::all();
        $products = Product::all();

        return view('productions.create' , compact('structures', 'lines', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     */

    // public function store(Request $request)
    // {
    //     // $products = Product::findOrFail($request->product_id);

    //     $this->validate($request, [
    //         'dateprod' => 'required',
    //         'equipe' => 'required',
    //         'quart' => 'required',
    //         'structure_id'=>'required',
    //         'line_id'=>'required',
    //         // 'product_id'=>'required',

    //     ]);
    //     Production::create($request->all());

    //     return redirect()->route('productions.index')
    //                     ->with('success','Production created successfully.');

    // }

    public function store(Request $request)
    {
        $products = Product::findOrFail($request->product_id);
        $products -> productions()->create([
            'production_id' => $request->production_id,
            'dateprod' => $request->dateprod,
            'equipe' =>  $request->equipe,
            'quart' =>  $request->quart,
            'structure_id'=> $request->structure_id,
            'line_id'=> $request->line_id,
        ]);
        return redirect()->route('productions.index')
                        ->with('success','Line created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        $printings = Printing::all();
        return view('productions.show',compact('production','printings'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        return view('productions.edit',compact('production'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {

       $production = Production::find($id);

       $production->dateprod = $request->input('dateprod');
       $production->equipe = $request->input('equipe');
       $production->quart = $request->input('quart');

       $production->save();

       return redirect()->route('productions.index')
                        ->with('success','Production updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $production_id)
    {
       $production = Production::findOrFail($production_id);

      $production->delete();

        return redirect()->route('productions.index')
                        ->with('success','Production deleted successfully');


       }
       public function print(production $production){
        return view('productions.print',compact('production'));


       }

    }
