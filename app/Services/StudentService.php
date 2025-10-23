<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    public static function update(User $user, array $data): void
    {
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        } elseif (isset($data['password']) || !$data['password']) {
            unset($data['password']);
        } 

        if (isset($data['image'])) {
            $data['image'] = Storage::put('', $data['image']);
        }

        if (isset($data['image']) && $user->image) {
            Storage::delete($user->image);
        }

        $user->update($data);
    }
}
