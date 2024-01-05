<?php

declare(strict_types=1);

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use illuminate\Support\Str;

class CreateRecordController extends Controller
{
    public function index()
    {
        return view('record.money-records');
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'money_amount' => ['required', 'numeric'],
            ]
        );

        try {
            $record = Record::create(
                [
                    'record_id' => (string)Str::uuid(),
                    'money_amount' => $validate['money_amount'],
                    'user_id' => Auth::user()->user_id,
                ]
            );
        } catch (Exception $exception) {
            Log::error(report($exception));
            return redirect()->back();
        }

        return view('record.record-complete');
    }
}
