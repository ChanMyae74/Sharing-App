<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

use App\Models\Attachment;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    public function information(User $user)
    {
        return Inertia::render('Profile/Profile');
    }

    public function upload_profile(Request $request, User $user, Attachment $attachment)
    {
        $profile_photo = $request->file('profile_photo');
        try {
            DB::beginTransaction();
            if ($profile_photo) {
                $request->validate([
                    'profile_photo' => 'image|mimes:png,jpg,gif,jpeg|max:2048'
                ]);
                $unique_name = uniqid() . "_profile_photo_" . $request->file('profile_photo')->getClientOriginalName();
                $org_name = $request->file('profile_photo')->getClientOriginalName();
                $extension = $request->file('profile_photo')->extension();
                $path = 'public/ProfileAttachment/';
                $profile_attachment_param = [
                    'uuid' => Str::uuid()->toString(),
                    'user_id' => \auth()->id(),
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path,
                    'status' => 'profile_photo'
                ];
                $attachment->create($profile_attachment_param);
                $profile_user_param = [
                    'photo' => $unique_name
                ];
                $user->update($profile_user_param);
                $profile_photo->storeAs($path, $unique_name);
                DB::commit();

                return \redirect()->back()->with('message', 'Upload profile success.');
            }
        }
        catch (QueryException $queryException){
            DB::rollBack();

            return \redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    public function upload_cover(Request $request, User $user, Attachment $attachment)
    {
        $profile_cover = $request->file('profile_cover');
        try {
            DB::beginTransaction();
            if ($profile_cover) {
                $request->validate([
                    'profile_cover' => 'image|mimes:png,jpg,gif,jpeg|max:2048'
                ]);
                $unique_name = uniqid() . "_profile_cover_" . $request->file('profile_cover')->getClientOriginalName();
                $org_name = $request->file('profile_cover')->getClientOriginalName();
                $extension = $request->file('profile_cover')->extension();
                $path = 'public/ProfileAttachment/';
                $profile_attachment_param = [
                    'uuid' => Str::uuid()->toString(),
                    'user_id' => \auth()->id(),
                    'org_name' => $org_name,
                    'unique_name' => $unique_name,
                    'extension' => $extension,
                    'path' => $path,
                    'status' => 'profile_cover'
                ];
                $attachment->create($profile_attachment_param);
                $profile_user_param = [
                    'profile_cover' => $unique_name
                ];
                $user->update($profile_user_param);
                $profile_cover->storeAs($path, $unique_name);
                DB::commit();

                return \redirect()->back()->with('message', 'Upload profile success.');
            }
        }
        catch (QueryException $queryException){
            DB::rollBack();

            return \redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit', \auth()->user())->with('message','Update Profile Information Successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
