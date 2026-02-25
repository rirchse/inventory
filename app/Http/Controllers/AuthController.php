<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\User;
use Session;

class AuthController extends Controller
{
  public function create()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string',
      'mobile' => 'required|string',
      'owner' => 'required|string',
      'contact_person' => 'required|string',
      'contact' => 'required|string',
      'website' => 'required|string',
      'address' => 'nullable|string',
      'email' => 'required|string',
      'password' => 'required|string',
    ]);

    $shop_exists = Shop::where('domain', $data['website'])->first();
    if($shop_exists)
    {
      Session::flash('error', 'You already registered. Login to your account.');
      return redirect()->route('login');
    }

    try {
      $shop = Shop::create([
        'name' => $data['name'],
        'phone' => $data['mobile'],
        'address' => $data['address'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'owner' => $data['owner'],
        'contact_person' => $data['contact_person'],
        'contact' => $data['contact'],
        'domain' => $data['website'],
        'status' => 'Active',
        'created_by' => 0
      ]);

      $user = User::create([
        'shop_id' => $shop->id,
        'role_id' => 2,
        'name' => $data['owner'],
        'contact' => $data['contact'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'status' => 'Active'
      ]);
      
      Session::flash('success', 'Registration successfull! Now login to your account.');
      return redirect()->route('login');
    }
    catch(\Exception $e)
    {
      return $e->getMessage();
    }
  }
    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|string'
      ]);

      $credentials = $request->only('email', 'password');

      if(! $token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
      auth('api')->logout();
      return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
      return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
      return response()->json([
          'access_token' => $token,
          'token_type'   => 'bearer',
          'expires_in'   => auth('api')->factory()->getTTL() * 60
      ]);
    }
}
