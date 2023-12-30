<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordRestModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function index()
    {
        return view(('Auth.password-reset-request'));
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'email' => ['required', 'email:filter,dns', 'between:1,256'],
            ]
        );

        $user = User::where('email', $validate['email'])->first();

        $reset_id = (string)Str::uuid();

        try {
            $reset = PasswordRestModel::create(
                [
                    'reset_id' => $reset_id,
                    'user_id' => $user->user_id,
                ]
            );
        } catch (Exception $exception) {
            dd($exception);
        }

        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        $to = $user->email;
        $subject = 'メールアドレスを登録してください';

        $reset_link = 'https://money-logger.localhost/reset_id/' . $reset_id . '/index';
        $message = <<<MSG_EOF
        下のリンクから登録してねん。

        {$reset_link}
        MSG_EOF;

        $header = 'From: from@example.com';

        mb_send_mail($to, $subject, $message, $header);

        return view('Auth.password-reset-request-conpulete');
    }
}
