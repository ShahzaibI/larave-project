<?php
namespace App\Http\Controllers;

use App\Http\Requests\ForgotChangeRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


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

        return $this->getUserService()->store($request);
        // $request_params = Input::all();
        // echo "<pre>";
        // print_r($request_params);
        // die();
        // dd('ok');
        // $user = new User();
        // $exist_email = $user->getUserByEmail($request->email);
        // if(!$exist_email->isEmpty())
        // {
        //     // dd($exist_email);
        //     return back()->withInput()->withErrors(['email'=>'Email already exists']);
        // }
        // try
        // {
        //     $userData = [];
        //     $userData['user_name'] = $request->user_name;
        //     $userData['first_name'] = $request->firstName;
        //     $userData['last_name'] = $request->lastName;
        //     $userData['gender'] = $request->gender;
        //     $userData['email'] = $request->email;
        //     $userData['password'] = Hash::make($request->password);
        //     $userData['phone'] = $request->phone;
        //     User::create($userData);
        //     return redirect()->route('loginUser')->with('success', 'User successfully created Please login');
        // }
        // catch(\Exception $e)
        // {
        //     Log::error($e->getMessage());
        //     return back()->withInput()->with('error', 'Failed to save user information. Please try again.');
        // }
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

    public function loginPage()
    {
        return $this->getUserService()->loginPage();
    }
    public function register()
    {
        return $this->getUserService()->register();
    }

    public function login(LoginRequest $request)
    {
        return $this->getUserService()->login($request);
    }

    public function logout()
    {
        return $this->getUserService()->logout();
    }

    // Change Password
    public function resetPassword()
    {
        return $this->getUserService()->resetPassword();
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        return $this->getUserService()->updatePassword($request);
    }

    // Forgot Password
    public function forgotPassword()
    {
        return $this->getUserService()->forgotPassword();
    }

    public function sentForgotPasswordEmail(ForgotPasswordRequest $request)
    {
        return $this->getUserService()->sentForgotPasswordEmail($request);
    }

    public function resetForm($token)
    {
        return $this->getUserService()->resetForm($token);
    }

    public function changePassword(ForgotChangeRequest $request)
    {
        return $this->getUserService()->changePassword($request);
    }
}
