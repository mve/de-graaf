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
        $unsortedorders = Order::with('product', 'receipt.reservation.tables');

        $unsortedorders = $unsortedorders->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.orders', compact('unsortedorders'));
    }

    public function getBarOrders()
    {
        $unsortedorders = Order::with('receipt.reservation.tables', 'product.subcourse.maincourse');

        $unsortedorders = $unsortedorders->orderBy('created_at', 'desc')->get();

        return view('admin.barOrders', compact('unsortedorders'));
    }

    public function getKitchenOrders()
    {
        $unsortedorders = Order::with('product', 'receipt.reservation.tables');

        $unsortedorders = $unsortedorders->orderBy('created_at', 'desc')->get();

        return view('admin.kitchenOrders', compact('unsortedorders'));
    }

    public function removeOrder($id)
    {
        dd($id);
    }

    public function getDishes()
    {

        $selectedCategory = \request('category');

        $subcoursce = SubCourse::with('products')->where("name", 'LIKE', $selectedCategory)->get();
        $products   = Product::all()->where('sub_course_id', '=', $subcoursce[0]->id);

        return json_encode($products);
    }

    public function getData()
    {

        $todayDate = date('Y-m-d');

        $unsortedreservations = Reservation::with('tables', 'user', 'receipt')->where('date', '=', $todayDate)->get();

        return view('admin.createOrder', compact('unsortedreservations'));
    }

    public function createOrder(Request $request)
    {
        $products       = $request['products'];
        $reservationId  = $request['reservationid'];
        $productenarray = [];
        $reservation    = Reservation::with('receipt')->find($reservationId);
        $count          = 1;
        $quantitys      = [];
        foreach ($products as $item) {

            if (in_array($item[0], $productenarray)) {
                $count++;
            }

            $test = $item[0];
            array_push($productenarray, $test);
            array_push($quantitys, $count, $test);


        }
        $quantitys = array_count_values($productenarray);

        $product = Product::all()->whereIn("name", $productenarray);

        foreach ($product as $addproduct) {
            $orders = Order::create([
                'product_id' => $addproduct->id,
                'receipt_id' => $reservation->receipt->id,
                'quantity'   => $quantitys[$addproduct->name],

            ]);
        }

        return 'Bestelling geplaatst';
    }

    public function deleteOrder($id)
    {
        $Order = Order::all()->find($id);
        $Order->delete();

        return redirect()->back();
    }

    public function preparedOrder($id)
    {
        $Order = Order::all()->find($id);

        $Order->prepared = 1;
        $Order->save();

        return redirect()->back();
    }


}
