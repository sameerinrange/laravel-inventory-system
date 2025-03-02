<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
 
use Illuminate\Support\Facades\Storage;
use App\Models\Currency;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::all();
        $users = User::whereNot('role',  'SuperAdmin')->get();
 
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $currencies = \App\Models\Currency::where('status', 'active')->orderBy('name', 'asc')->get();

        return view('users.create', [
            'currencies' => $currencies
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        // $image = $request->file('photo');
        
        // dd($image->getClientOriginalName(), $image->getSize(), $image->getMimeType());
        // dd($request->all());
         
        $validated = $request->validated();
        $currency = Currency::where('currency_code', $validated['currency_code'])->first(); 
        // Hash the password
        $validated['password'] = Hash::make($validated['password']);
        
        // Set default role to 'Shop' if not provided
        $validated['role'] = $validated['role'] ?? 'Shop';
        $validated['currency'] = $currency->name;
        $validated['currency_symbol'] = $currency->currency_symbol; 
        $validated['currency_code'] = $currency->currency_code; 
        $user = User::create($validated);   
 
        /**
         * Handle upload an image
         */
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $file->storeAs('profile/', $filename, 'public');
            $user->update([
                'photo' => $filename
            ]);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'New Shop User has been created!');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {

         

//        if ($validatedData['email'] != $user->email) {
//            $validatedData['email_verified_at'] = null;
//        }

        $user->update($request->except('photo'));

        /**
         * Handle upload image with Storage.
         */
        if($request->hasFile('photo')){

            // Delete Old Photo
            if ($user->photo && Storage::exists('public/profile/' . $user->photo)) {
                Storage::delete('public/profile/' . $user->photo);
            }

            /* if($user->photo){
                unlink(public_path('storage/profile/') . $user->photo);
            } */

            // Prepare New Photo
            $file = $request->file('photo');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('profile/', $fileName, 'public');

            // Save DB
            $user->update([
                'photo' => $fileName
            ]);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User has been updated!');
    }

    public function updatePassword(Request $request, String $username)
    {
        # Validation
        $validated = $request->validate([
            'password' => 'required_with:password_confirmation|min:6',
            'password_confirmation' => 'same:password|min:6',
        ]);

        # Update the new Password
        User::where('username', $username)->update([
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User has been updated!');
    }

    public function destroy(User $user)
    {
        /**
         * Delete photo if exists.
         */
        if($user->photo){
            unlink(public_path('storage/profile/') . $user->photo);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User has been deleted!');
    }
}
