<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordRestModel;
use App\Models\User;

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
}
