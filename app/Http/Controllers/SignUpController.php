<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use illuminate\Support\Str;

class SignUpController extends Controller
{
    public function index()
    {
        return view(('Auth.sign-up'));
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'name' => ['required', 'string', 'between:1,256'],
                'email' => ['required', 'email:filter,dns', 'between:1,256'],
                'password' => ['required', 'string', 'between:8,16'],
            ]
        );

        try {
            $users = User::create(
                [
                    'user_id' => (string)Str::uuid(),
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                    'password' => $validate['password'],
                ]
            );
        } catch (Exception $exception) {
            Log::error(report($exception));
            return redirect()->back();
        }

        return view('Auth.sign-up-complete');
    }
}
