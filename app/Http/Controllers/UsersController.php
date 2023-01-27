<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Jobs\GetUserJob;
use App\Jobs\UserJob;
use App\Models\User;

class UsersController extends Controller
{
    public function index(): UsersResource
    {
        return new UsersResource(User::get());
    }

    public function show(int $id): UserResource
    {
        $user = GetUserJob::dispatchSync($id);
        return new UserResource($user);
    }

    public function store(UserSaveRequest $request): UserResource
    {
        $user = UserJob::dispatchSync($request->all());
        return new UserResource($user);
    }
}
