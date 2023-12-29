<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordRestModel;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    const LENGTH = 36;

    public function index(string $reset_id)
    {
        if (mb_strlen($reset_id) !== self::LENGTH) {
            abort(404);
        }

        if (PasswordRestModel::where('reset_id', $reset_id)->first() === null) {
            abort(404);
        }

        $reset_data = PasswordRestModel::where('reset_id', $reset_id)->first();
        $user_id = $reset_data->user_id;

        if (User::where('user_id', $user_id)->first() === null) {
            abort(404);
        }

        return view('Auth.password-reset', [
            'user_id' => $user_id,
        ]);
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'user_id' => ['required', 'string', 'size:36'],
                'password' => ['required', 'string', 'between:8,16'],
            ]
        );

        $user = User::where('user_id', $validate['user_id'])->first();

        $new_user = $user;

        $new_user->password = $validate['password'];

        $new_user->save();

        return view('Auth.password-reset-complete');

        dd($new_user);
    }
}
