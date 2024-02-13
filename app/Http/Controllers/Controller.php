<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $usuario;
    protected int $id_usuario;
    protected object $logSystem;

    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->logSystem = Log::channel('log_system');
    }

    protected function validate(Request $request, array $validate)
    {
        $validate = Validator::make($request->all(), $validate);
        if ($validate->fails()) {
            throw new HttpResponseException(response()->json($validate->errors(), 422));
        }

        return $validate->validated();
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL()
        ], 200);
    }
}
