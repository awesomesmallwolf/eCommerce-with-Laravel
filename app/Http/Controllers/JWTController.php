<?php

namespace App\Http\Controllers;


use App\Mail\RegisterMailToAdmin;
use App\Mail\RegisterMailToUser;
use App\Models\configurationmanage;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class JWTController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $adminmail=configurationmanage::all()[0];
        // return $adminmail;
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8,20}$/',
            'confirmpassword' => 'required|same:password',
        
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        $finalpass= Hash::make($request->password);
        $user = User::create([
                'firstname' => $request->firstname,
                'lastname'=>$request->lastname,
                'email' => $request->email,
                'password' =>$finalpass,
                'confirmpassword'=>$finalpass,
            ]);

            
        Mail::to($request->email)->send(new RegisterMailToUser($request->all()));
      
        Mail::to($adminmail->notifyemail)->send(new RegisterMailToAdmin($request->all()));

        return response()->json([
            'message' => 'User successfully registered GO and Login ',
            'error'=>'',
            'user' => $user
        ]);
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'    => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }
        else {

            $user=User::where('email',$request->email)->first();
           


            if(!$token=auth()->guard('api')->attempt($validator->validated())){
               return response()->json(['error'=>'user is Unauthorized,registerd first']);
            }
            
            return response()->json(['access_token' => $token,'error'=>0 ,'message' => 'Login successfully.', 'status' => 1, 'email'=>$request->email,'user'=>$user->id],200);
            // return $this->respondWithToken($token,$request->all());
        }
    }

    
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

 
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

   
    public function profile()
    {
        return response()->json(auth()->user());
    }

    
    protected function respondWithToken($token,$data)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'message'=>"Login Done",
           'user'=>$data['email']

        ]);
    }

    function change(Request $request)
    {
        // $id=auth()->user();
    
        return response()->json(['done'=>500]);
    }


}