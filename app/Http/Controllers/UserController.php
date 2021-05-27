<?php

namespace App\Http\Controllers;

    use App\Models\Cuenta;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;
    use Auth;
    use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
    $credentials = $request->only('email', 'password');
    try {
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 400);
        }
    } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
    }
    return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
    try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
        }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }


    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'nombre' => 'required|string',
                'pais' => 'required|string',
                'edad' => 'required|int',
            'genero' => 'required|string',
            'info' => 'string',
                'rutaFoto' => 'string'
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $rules = [

        ];
        $this->validate($request, $rules);

        $cuenta = new Cuenta();
        $cuenta->idUsuario = $user->id;
        $cuenta->nombre = $request->input('nombre');
        $cuenta->pais = $request->input('pais');
        $cuenta->edad = $request->input('edad');
        $cuenta->genero = $request->input('genero');
        $cuenta->info = $request->input('info');

        $cuenta->save(); //INSERT

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','cuenta', 'token'),201);
    }
    public function logout(){

        Auth::guard('api')->logout();
        $success = 'Sesión cerrada';
        return compact('success');
    }
}
