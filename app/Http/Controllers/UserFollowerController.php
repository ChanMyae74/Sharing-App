<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFollowerRequest;
use App\Http\Requests\UpdateUserFollowerRequest;
use App\Models\User;
use App\Models\UserFollower;
use App\Repository\ArticleInterface;
use Inertia\Inertia;

class UserFollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return Inertia::render('Profile/Followings', [
            'followings' => [],
            'profile' => [
                'user' => $user
            ]
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserFollowerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFollower $userFollower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserFollower $userFollower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateUserFollowerRequest $request,
        UserFollower $userFollower
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFollower $userFollower)
    {
        //
    }
}
