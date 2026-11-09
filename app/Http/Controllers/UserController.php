<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'full_name' => 'required|string|max:255'
        ]);

        User::create([
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
            'name' => $validated['full_name'],
            'password' => Str::random(40)
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];
        $user->name = $validated['full_name'];

        if ($request->hasFile('avatar')) {

            $image = new ImageManager(new Driver());

            $image = $manager->read($request->file('avatar'));

            $image->scaleDown(300, 300);

            $filename = Str::uuid() . '.jpg';

            $path = 'avatars/' . $filename;

            Storage::disk('public')->put(
                $path,
                (string) $image->toJpeg(80)
            );

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}


