<?php

namespace App\Repositories\User\UserRepository;

use App\Models\User\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model
            ->create([
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
    }
}
