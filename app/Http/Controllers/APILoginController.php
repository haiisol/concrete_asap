<?php

namespace App\Http\Controllers;

use App\Notifications\PasswordResetRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Validator;



class APILoginController extends Controller
{
    use SendsPasswordResetEmails;

    private $user_repo;

	 /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user_repo){
        $this->user_repo=$user_repo;

        $this->middleware('jwt.verify', ['except' => ['login','register','resetPassword']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$credentials = $request->only('email', 'password');

        if ($token = auth('api')->attempt($credentials)) {
            $user=auth('api')->user();
            // $user->roles()->makeHidden('pivot');
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                // 'expires_in' => auth('api')->factory()->getTTL(),
                'roles'=>$user->getRoleNames()
            ]);
        }

        return response()->json(['message' =>'Wrong Username or password','errors'=>$token], 401);
    }

    public function resetPassword(Request $request){

   }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        $roles=$request->get("roles");

        $validator = Validator::make($request->all(), [
            'company'=>'required',
            'abn'=>'required',
            "title"=>"required",
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|unique:users',
            'phone'=>'required',
            'city'=>'required',
            'state'=>'required',
            'password' => 'required',
            'confirm_password'=>'required|same:password',
            'roles'=>'in:contractor,rep',
            'photo'  => 'mimes:jpeg,png|max:2048',
        ]);


        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json(['message'=>"Please check the entered value.","errors"=>$errors],401);
        }

    	$user_details = $request->only('email', 'password','first_name','last_name','phone','abn','company','state','city','roles','title');

        if($this->user_repo->save($user_details,$request->file("photo"))){
            if ($token = auth('api')->attempt(["email"=>$user_details["email"],"password"=>$user_details["password"]])) {

                $user=auth('api')->user();

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL()* 60,
                    'roles'=>$user->getRoleNames()
                ]);
            }
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user=auth('api')->user();
        $user->roles=auth('api')->user()->getRoleNames();
        return response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth('api')->factory()->getTTL()* 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
