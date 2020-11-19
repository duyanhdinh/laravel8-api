<?php

namespace App\Repositories\User\UserRepository;

use App\Repositories\RepositoryContract;

interface UserRepositoryInterface extends RepositoryContract
{
    public function create($data);
}
