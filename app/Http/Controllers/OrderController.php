<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Receipt;
use App\Reservation;
use App\SubCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    public function getOrders()
    {
        $unsortedorders = Order::with('product', 'receipt.reservation.tables')->paginate(6);

        return view('admin.orders', compact('unsortedorders'));
    }

    public function removeOrder($id){
        dd($id);
    }

    public function getDishes(){

        $selectedCategory = \request('category');

        $subcoursce = SubCourse::with('products')->where("name", 'LIKE', $selectedCategory)->get();
        $products = Product::all()->where('sub_course_id', '=', $subcoursce[0]->id);
        return json_encode($products);
    }

    public function getData()
    {

        $todayDate = date('Y-m-d');

        $unsortedreservations = Reservation::with('tables', 'user', 'receipt')->where('date', '=', $todayDate)->get();

        return view('admin.createOrder', compact( 'unsortedreservations'));
    }

    public function createOrder(Request $request){
        $products = $request->all();

        foreach ($products as $item)
        {
            $product = Product::all()->where("name", 'LIKE', $item[0]);
            $orders = Order::create([
                'product_id' => $product[0]['id'],
            ]);
        }

        return $product;

//
//        $receipt = new Receipt();
//
//        $receipt->save();
    }
}
