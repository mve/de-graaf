<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Receipt;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminGet()
    {
        $unsortedorders = Order::with('product', 'receipt.reservation.tables')->paginate(6);

        return view('admin.orders', compact('unsortedorders'));
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
