<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utenti;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
  
        $this->create($request->all());
  
        return redirect()->route("login");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nome' => ['required', 'string', 'max:25'],
            'Cognome' => ['required', 'string', 'max:25'],
            'Username' => ['required', 'string', 'min:5', 'max:15', 'unique:utenti'],
            'Sesso' => ['required', 'string', 'max:1'],
            'DataNascita' => ['required', 'date'],
            'role' => ['required', 'string', 'max:14'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Utenti::create([
            'Nome' => $data['Nome'],
            'Cognome' => $data['Cognome'],
            'Username' => $data['Username'],
            'Sesso' => $data['Sesso'],
            'DataNascita' => $data['DataNascita'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
