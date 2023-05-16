<?php
 namespace App\Http\Controllers;

 use App\Models\Printing;
 use App\Models\Production;
 use Illuminate\Http\Request;
 use Illuminate\Support\Str;
 use Illuminate\Support\Carbon;
use DateTime;
 
 
 use App\Http\Requests\StoreImpressionRequest;
 use App\Http\Requests\UpdateImpressionRequest;
 
 class PrintingController extends Controller
 {
     /**
      * Display a listing of the resource.
      */
 
 
   
     public function index()
     {
        $currentDate = now();

        $printings = Printing::latest()->paginate(5);
        return view('printings.index', compact('printings', 'currentDate'))
             ->with('i', (request()->input('page', 1) - 1) * 5);

            //  return view('printings.index', compact('printings', 'production' ,'currentDate'));

     }
 
     /**
      * Show the form for creating a new resource.
      */
    

    public function create(Production $production)
    {
        $currentDate = now()->toDateString();
   
        // return view('printings.create', compact('production'));
        $printing = new Printing();

        return view('printings.create', compact('currentDate' ,'production', 'printing'));

    }
    
    
    
    
    
    

      
 
     /**
      * Store a newly created resource in storage.
      */
  

public function store(Request $request)
{
    $request->validate([
        'production_id' => 'required|exists:productions,id',
        'quantite' => 'required|numeric',
        'date_inst' => 'required|date',
    ]);
    $date_inst = new DateTime($request->input('date_inst'));

    $production = Production::findOrFail($request->production_id);

    $printing = new Printing;
    $printing->production_id = $request->production_id;
    $printing->quantite = $request->quantite;
    $printing->date_inst = $request->date_inst;
    $printing->save();

    return redirect()->route('productions.show', $printing->production_id);

   }





      
     /**
      * Display the specified resource.
      */
     public function show(Printing $printing)
     {
         return view('printings.show',compact('printing'));
 
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(int $printing)
     {
         $productions = Production::all();
         // $printing = Printing::findOrFail($printing);
         // return view('printings.edit' ,compact('printing'));
         $printing = Printing::findOrFail($printing);
         return view('printings.edit', compact('printing', 'productions'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request , $printing_id)
     {
         $production = Production::findOrFail($request->production_id);
         $production->Printings()->where('id',$printing_id)->update([
            'dateimp' => $request->dateimp,
            'quantite'=> $request->quantite,
            // 'LOT'=> $request->LOT,
 
           ]);
           return redirect()->route('printings.index')
           ->with('success','Production updated successfully');    }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Printing $printing)
     { 
         $printing->delete();
 
         return redirect()->route('printings.index')
                         ->with('success','Product deleted successfully');
     }
 }