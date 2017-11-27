<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function mainPage()
    {
        
       return view('main');

    }


    public function registration()
    {
        return view('registration');
    }


    public function regSubmit(Request $request)
    {
        

        $data = $request->all();

        $password = $data['psw'];

            


        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            
            'password' => bcrypt($password)
        ]);

        if($user->id)
        {
            return view('login');
        }else{
            return ['success'=>false];
        }



    }



    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {

        $loginData = [];

        $loginData['email'] = $request->get('uname');
        $loginData['password'] = $request->get('password');

        //dd($loginData);
        if (Auth::attempt($loginData, $request->has('remember'))) {

            $user=Auth::user();
            
            return ['success' => true, 'message' => 'Login successful'];
        }


        return ['success' => false, 'message' => 'Login failure'];




    }


}
