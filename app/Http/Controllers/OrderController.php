<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class OrderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','show']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
    {


        $orders = Order::latest()->paginate(5);


        return view('orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $orderProducts = $order->products;
        $customers = Customer::all();

        return view('orders.create',compact('customers', 'orderProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Order $order)
    {

        $customers = Customer::findOrFail($request->customer_id);
        $order= $customers -> orders()->create([
            'order_id' => $request->order_id,
            'numBC' => $request->numBC,
            'depotdest' => $request->depotdest,
            'dateorder' => $request->dateorder,

        ]);
        



        foreach ($request->orderProducts as $product) {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }


        return redirect()->route('orders.index')
        ->with('success','Order created successfully.');

    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orderProducts = $order->products;
        return view('orders.show',compact('order', 'orderProducts'));
        // $orderProducts = $order->products;
        // return view('orders.show',['order' => $order],compact('order','orderProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $order)
    {
        // $orderProducts = $order->orderProducts;
        // $allProducts = Product::all();
        $customers = Customer::all();
        $order = Order::findOrFail($order);
        return view('orders.edit', compact('customers', 'order'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id)
    {


    //     $order = Order::find($id);
    //    $order->numBC = $request->input('numBC');
    //    $order->depotdest = $request->input('depotdest');
    //    $order->dateorder = $request->input('dateorder');

    //     $order->save();
        $customer = Customer::findOrFail($request->customer_id);
        $customer->orders()->where('id', $order_id)->update([
            'numBC'=> $request->numBC,
            'depotdest'=> $request->depotdest,
            'dateorder'=> $request->dateorder
        ]);

       return redirect()->route('orders.index')
                        ->with('success','Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {

        $order->delete();
        $orderProducts = $order->products;

        return redirect()->route('orders.index', compact('orderProducts'))
                        ->with('success','Order deleted successfully');
    }
}
