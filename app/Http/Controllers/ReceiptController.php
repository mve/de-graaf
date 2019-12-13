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
        // haal de nota op, zeg dat het geen pdf moet zijn zodat in frontend de terugknop en donwloadknop zichtbaarzijn.
        $receipt = Receipt::find($id);
        $isPdf = false;
        return view('admin.receipt', compact('receipt', 'isPdf'));
    }

    public function downloadPDF($id)
    {
        //Als admin op download knop drukt download hij de pdf zonder de download en terugknop.
        $receipt = Receipt::find($id);
        $isPdf = true;
        $pdf = PDF::loadView('admin.receipt', compact('receipt', 'isPdf'));
        return $pdf->download('receipt.pdf');
    }

    public function downloadPDFbyUser($id)
    {
        //Haalt huidige gebruiker op zoekt nota op bij ID
        $user = Auth::user();
        $isPdf = true;
        $receipt = Receipt::find($id);

        //Kijkt of de nota wel echt bij de huidige gebruiker hoort, zo niet dan stuurt hij je terug
        if ($receipt->reservation->user_id == $user->id) {

            $pdf = PDF::loadView('admin.receipt', compact('receipt', 'isPdf'));
            return $pdf->download('receipt.pdf');
        }
        return back();

    }
}
