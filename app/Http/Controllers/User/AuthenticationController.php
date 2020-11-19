<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Services\User\Auth\LoginServices;
use App\Services\User\Auth\RegisterServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticationController extends Controller
{
    /**
     * @var RegisterServices
     */
    private $registerServices;
    /**
     * @var LoginServices
     */
    private $loginServices;

    public function __construct(RegisterServices $registerServices,
                                LoginServices $loginServices)
    {
        $this->registerServices = $registerServices;
        $this->loginServices = $loginServices;
    }

    /**
     * Store user have not company
     *
     * @param RegisterRequest $request
     * @return array
     */
    public function register(RegisterRequest $request)
    {
        return $this->registerServices->handle($request->all());
    }

    /**
     *
     *
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request)
    {
        return $this->loginServices->handle($request->all());
    }
}
