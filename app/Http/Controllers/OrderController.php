<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Receipt;
use App\Reservation;
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

    public function getData()
    {

        $todayDate = date('Y-m-d');

        $unsortedreservations = Reservation::with('tables', 'user')->where('date', '=', $todayDate)->get();

        return view('admin.createOrder', compact( 'unsortedreservations'));
    }

    public function createOrder(){
        $order = new Order();

        $product = new Product();

        $orders = Orders::create([
            'order_id' => $order->id,
            'product_id' => $request['people'],
            'date' => $request['date'],
            'time' => $request['selectorTime'].':00:00',
            'comment' => $request['comment'],
            'reservation_typ' => $request['selectorType']

        ]);

        $receipt = new Receipt();

        $receipt->save();

        $receipt->orders()->attach($order->id);
    }
}
