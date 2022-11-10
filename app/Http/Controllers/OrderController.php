<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(5);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('id','desc')->paginate(5);
        $products = Product::orderBy('id','desc')->paginate(5);
        $lastOrderNumber = Order::latest()->first();
        if(empty($lastOrderNumber)){
            $orderNumber = 1;
        }else{
            $orderNumber = $lastOrderNumber->id+1;
        }
        return view('orders.create', compact('customers', 'orderNumber', 'products'));
    }

    public function getProductCode($code = 0)
    {
        $code = Product::orderby("id","asc")
        ->select('*')
        ->where('id',$code)
        ->get();

        return response()->json($code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'product_name' => 'required',
        //     'product_code' => 'required',
        //     'price' => 'required',
        //     'expiry_date' => 'required',
        // ]);
        
        // Product::create($request->post());

        // return redirect()->route('products.index')->with('success','Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
