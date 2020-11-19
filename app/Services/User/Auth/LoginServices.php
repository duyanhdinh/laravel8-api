<?php

namespace App\Services\User\Auth;

use App\Repositories\User\UserRepository\UserRepositoryInterface;
use App\Services\BaseService;

class LoginServices extends BaseService
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($data)
    {
        $response = oauth2_user($data['email'], $data['password']);

        if ($response['code'] === config('constants.code.success')) {

            $oauth2 = $response['data'];
            return [
                'access_token' => $oauth2['token_type'] . ' ' . $oauth2['access_token'],
                'expires_in' => $oauth2['expires_in'],
            ];
        } else {
            return $response;
        }
    }
}
