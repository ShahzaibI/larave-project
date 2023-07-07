<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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
    public function store(StoreUserRequest $request)
    {
        // $request_params = Input::all();
        // echo "<pre>";
        // print_r($request_params);
        // die();
        $user = new User();
        $exist_email = $user->getUserByEmail($request->email_address);
        if(!$exist_email->isEmpty())
        {
            // dd($exist_email);
            return back()->withInput()->withErrors(['email_address'=>'Email already exists']);
        }
        try
        {
            $userData = [];
            $userData['user_name'] = $request->user_name;
            $userData['first_name'] = $request->firstName;
            $userData['last_name'] = $request->lastName;
            $userData['gender'] = $request->gender;
            $userData['email_address'] = $request->email_address;
            $userData['password'] = Hash::make($request->password);
            $userData['phone'] = $request->phone;
            User::create($userData);
            return redirect()->route('loginUser')->with('success', 'User successfully created Please login');
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Failed to save user information. Please try again.');
        }
    }

    public function loginPage()
    {
        return view('login');
    }
    public function register()
    {
        return view('signup');
    }

    public function login(LoginRequest $request)
    {
        // dd($request);
        $email_address = $request->email_address;
        $password = $request->password;
        // $result = Customer::where('email_address', $email_address)->get()->first();
        // // dd($result['customer_id']);
        // if ($result)
        // {
        //     if(Hash::check($password, $result['password']))
        //     {
        //         session()->put('user_id', $result['customer_id']);
        //         $user_name = $result['first_name'].' '.$result['last_name'];
        //         session()->put('user_name', $user_name);
        //         return redirect()->route('dashboardProduct')->with('success', 'Login successful');
        //     }
        //     else
        //     {
        //         return back()->withInput()->withErrors(['password'=>'Password is incorrect']);
        //     }
        // }
        // else
        // {
        //     return back()->withInput()->withErrors(['email_address'=>'Email does\'t exist']);
        // }

        if(Auth::attempt(['email_address' => $email_address, 'password' => $password]))
        {
            return redirect()->route('dashboardProduct')->with('success', 'Login successful');
        }
        else
        {
            return back()->withInput()->withErrors(['password'=>'Password is incorrect']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginUser')->with('success', 'Successfully logged out');

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
}
