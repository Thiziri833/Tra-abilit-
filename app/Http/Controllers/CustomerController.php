<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create([
            'code'=>$request->code,
            'name'=>$request->name,
            'wilaya'=>$request->wilaya,
            'activite'=>$request->activite,
        ]);
        // request()->validate([
        //     'code' => 'required',
        //     'name' => 'required',
        //     'wilaya' => 'required',
        //     'activite' => 'required',
        // ]);

        // Customer::create($request->all());

        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->code = $request->input('code');
        $customer->name = $request->input('name');
        $customer->wilaya = $request->input('wilaya');
        $customer->activite = $request->input('activite');

        $customer->save();

        return redirect()->route('customers.index')
                         ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->orders()->delete();
        $customer->delete();

        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully with all its orders');
    }
}
