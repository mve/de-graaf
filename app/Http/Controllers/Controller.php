<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendmail(Request $request)
    {
        // Check of alles is ingevuld
        $this->validate(request(), [

            'email' => 'required',
            'subject' => 'required',
            'name' => 'required',
            'message' => 'required',
        ]);
        //Verstuur de mail.
        Mail::send(new contact($request));

        //Stuur user terug met message.
        return redirect()->back()->with('success', 'Je bericht is verstuurd');
    }
}
