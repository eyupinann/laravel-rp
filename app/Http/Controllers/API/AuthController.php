<?php

namespace App\Http\Controllers\API;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Custom\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Services\AuthServices;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    function __construct()
    {
        $this->service = new AuthServices();
        $this->user = auth('sanctum')->user();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $this->service->login($request);

        return Response::withData(true, "Tebrikler başarılı bir şekilde giriş yaptınız.", ['token' => JWTAuth::attempt($credentials)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $this->service->edit($request);

        return Response::withoutData(true, "Kullanıcı bilgileriniz başarılı bir şekilde güncellendi.");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $create = $this->service->create($request);

        return Response::withData(true, "Tebrikler başarılı bir şekilde kayıt oldunuz.", ['token' => JWTAuth::attempt($credentials)]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail()
    {
        return $this->service->detail();
    }

}
