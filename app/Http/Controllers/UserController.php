<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Haal de users op per 10.
        $users = User::paginate(10);

        return view('admin.users', compact('users'));
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        // Haal de huidige user op.
        $user = Auth::user();
        // Stuur de gebruiker mee naar de account pagina.
        return view('account', compact('user'));
    }

    /**
     * Update for users, can't change role.
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        // Valideer de input.
        $this->validate(request(), [
            'name'                 => ['sometimes', 'nullable', 'string', 'max:191'],
            'infix'                => ['sometimes', 'nullable', 'string', 'max:191'],
            'surname'              => ['sometimes', 'nullable', 'string', 'max:191'],
            'telephone'            => ['sometimes', 'nullable', 'numeric'],
            'zipcode'              => ['sometimes', 'nullable', 'string', 'min:4'],
            'city'                 => ['sometimes', 'nullable', 'string', 'max:191'],
            'address'              => ['sometimes', 'nullable', 'string', 'max:191'],
            // De captcha moet zijn ingevoerd.
            'g-recaptcha-response' => 'required|recaptcha',

            // Een email moet uniek zijn.
            'email'    => [
                'sometimes',
                'nullable',
                'string',
                'email',
                'max:191',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['sometimes', 'nullable', 'string', 'min:8']
        ]);

        // Als de invoer is veranderd, verander de gebruiker naar de invoer, anders hou de oude.
        $user->name      = (isset($request->name) > 0) ? $request->name : $user->name;
        $user->infix     = (isset($request->infix) > 0) ? $request->infix : $user->infix;
        $user->surname   = (isset($request->surname) > 0) ? $request->surname : $user->surname;
        $user->telephone = (isset($request->telephone) > 0) ? $request->telephone : $user->telephone;
        $user->zipcode   = (isset($request->zipcode) > 0) ? $request->zipcode : $user->zipcode;
        $user->city      = (isset($request->city) > 0) ? $request->city : $user->city;
        $user->address   = (isset($request->address) > 0) ? $request->address : $user->address;
        $user->email     = (isset($request->email) > 0) ? $request->email : $user->email;
        $user->password  = (isset($request->password) > 0) ? bcrypt(request('password')) : $user->password;

        $user->save();

        return back();
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminEdit(User $user)
    {
        return view('admin.editUser', compact('user'));
    }

    public function sendmail(Request $request)
    {
        $this->validate(request(), [

            'email' => 'required',
            'subject' => 'required',
            'name' => 'required',
            'message' => 'required',
        ]);
        Mail::send(new contact($request));

        return view('home');
    }

    /**
     * Update for admin, can change role.
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function adminUpdate(Request $request, User $user)
    {

        // Valideer de invoer. Als het niet klopt stuur de gebruiker terug met een error melding.
        $this->validate(request(), [
            'name'      => ['sometimes', 'nullable', 'string', 'max:191'],
            'infix'     => ['sometimes', 'nullable', 'string', 'max:191'],
            'surname'   => ['sometimes', 'nullable', 'string', 'max:191'],
            'telephone' => ['sometimes', 'nullable', 'numeric'],
            'zipcode'   => ['sometimes', 'nullable', 'string', 'min:4'],
            'city'      => ['sometimes', 'nullable', 'string', 'max:191'],
            'address'   => ['sometimes', 'nullable', 'string', 'max:191'],

            // Het e-mail van de gebruiker moet uniek zijn.
            'email'    => [
                'sometimes',
                'nullable',
                'string',
                'email',
                'max:191',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['sometimes', 'nullable', 'string', 'min:8'],
            'idadmin'  => ['sometimes', 'nullable', 'numeric']
        ]);

        // Als de invoer is veranderd, verander de gebruiker naar de invoer, anders hou de oude.
        $user->name      = (isset($request->name) > 0) ? $request->name : $user->name;
        $user->infix     = (isset($request->infix) > 0) ? $request->infix : $user->infix;
        $user->surname   = (isset($request->surname) > 0) ? $request->surname : $user->surname;
        $user->telephone = (isset($request->telephone) > 0) ? $request->telephone : $user->telephone;
        $user->zipcode   = (isset($request->zipcode) > 0) ? $request->zipcode : $user->zipcode;
        $user->city      = (isset($request->city) > 0) ? $request->city : $user->city;
        $user->address   = (isset($request->address) > 0) ? $request->address : $user->address;
        $user->email     = (isset($request->email) > 0) ? $request->email : $user->email;
        $user->password  = (isset($request->password) > 0) ? bcrypt(request('password')) : $user->password;
        $user->isadmin   = (isset($request->isadmin) > 0) ? $request->isadmin : $user->isadmin;

        $user->save();

        return back();
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleBlock(User $user)
    {
        // Als een gebruiker niet is geblokkeerd
        if ($user->blocked == 0) {

            // Blokeer de gebruiker
            $user->blocked = 1;
        } else {
            // Ontblokeer de gebruiker
            $user->blocked = 0;
        }

        $user->save();

        return back();
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminDelete(User $user)
    {
        // Zoek de reserveringen op die bij de user horen.
        $user = User::with('reservations.tables')->find($user->id);
        // Zet de user_id van de reserveringen op null.
        $user->reservations()->update(['user_id' => null]);

        // probeer de user te verwijderen.
        try {
            $user->delete();
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('/beheer/gebruikers');
    }
}
