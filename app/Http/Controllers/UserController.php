<?php

namespace App\Http\Controllers;

    use App\Models\Cuenta;
    use App\Models\Genero;
    use App\Models\Interes;
    use App\Models\Pais;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Storage;
    use JWTAuth;
    use Auth;
    use mysql_xdevapi\Exception;
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
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'nombre' => 'required|string',
            'idPais' => 'required|integer',
            'edad' => 'required|integer',
            'idGenero' => 'required|integer',
            'info' => 'string',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nombre' =>$request->input('nombre'),
            'idPais'=> $request->input('idPais'),
            'edad' => $request->input('edad'),
            'idGenero' => $request->input('idGenero'),
            'info'=> $request->input('info'),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'),201);
    }

    public function getInfoPersonal(Request $request){
        $user = User::find($request->user()->id);
        return $user;
    }

    public function subirFotoPerfil(Request $request){

        $rules = [
            'rutaFoto'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $this->validate($request, $rules);

        $usuario = User::find($request->user()->id);

        if($request->hasFile("rutaFoto")){
            if($usuario->rutaFoto == null){
                $usuario->rutaFoto = $request->file('rutaFoto')->store('public/imagen');
                $usuario->update($request->all());
                return response()->json([
                    'message' => 'Foto de perfil NUEVA guardada con éxito'
                ]);
            }
            else{
                Storage::delete($usuario->rutaFoto);
                $usuario->rutaFoto =  $request->file('rutaFoto')->store('public/imagen');
                $usuario->update($request->all());
                return response()->json([
                    'message' => 'Foto de perfil ACTUALIZADA con éxito'
                ]);
            }
        }
        else{
            return response()->json([
                'message' => 'Ocurrió un error, intentar de nuevo'
            ]);
        }
    }

    public function editInfo(Request $request){
        $rules = [
            'info' => 'required|string'
        ];
        $this->validate($request, $rules);

        $user = User::find($request->user()->id);
        $user->info = $request->input('info');
        $user->update($request->all());
        return response()->json([
            'message' => 'Info editada con éxito'
        ]);
    }

    public function logout(){

        Auth::guard('api')->logout();
        $success = 'Sesión cerrada';
        return compact('success');
    }

    //Interes
    public function getListaInteres(){
        return Interes::all();
    }
    //Pais
    public function getListaPais(){
        return Pais::all();
    }

    //Genero
    public function getListaGenero(){
        return Genero::all();
    }

    public function getUsuariosRecomendados(Request $request){
        return User::all();
    }

}
