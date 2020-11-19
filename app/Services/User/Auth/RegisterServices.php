<?php

namespace App\Services\User\Auth;

use App\Repositories\User\UserRepository\UserRepositoryInterface;
use App\Services\BaseService;

class RegisterServices extends BaseService
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
        return $this->basicResponse($this->userRepository->create($data));
    }
}
