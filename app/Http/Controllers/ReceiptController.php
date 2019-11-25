<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    //
    public function getReceipt($id)
    {


        $receipt = Receipt::with('orders.product')->find($id);

        $isPdf=false;
        return view('admin.receipt', compact('receipt', 'isPdf'));
    }

    public function downloadPDF($id) {
        $receipt = Receipt::with('orders.product')->find($id);
        $isPdf = true;

        $pdf = PDF::loadView('admin.receipt', compact('receipt', 'isPdf'));
        return $pdf->download('receipt.pdf');
    }

    public function downloadPDFbyUser($id) {
        $user = Auth::user();
        $isPdf = true;

        $receipt = Receipt::with('reservation','orders.product')->find($id);
        if ($receipt->reservation->user_id == $user->id) {

            $pdf = PDF::loadView('admin.receipt', compact('receipt', 'isPdf'));
            return $pdf->download('receipt.pdf');
        }
        return back();

    }

}
