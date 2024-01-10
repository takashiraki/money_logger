<?php

declare(strict_types=1);

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::get();
        // dd($categories);
        return view('Record.record', ['data' => $categories]);
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'amount_of_money' => ['required', 'numeric'],
                'category_id' => ['required', 'string', 'size:36'],
                'date' => ['required', 'date'],
                'name' => ['required', 'string', 'between:1,256'],
            ]
        );

        try {
            $record = Record::create(
                [
                    'record_id' => (string)Str::uuid(),
                    'amount_of_money' => $validate['amount_of_money'],
                    'category_id' => $validate['category_id'],
                    'date' => $validate['date'],
                    'name' => $validate['name'],
                    'user_id' => Auth::user()->user_id,
                ]
            );
        } catch (Exception $exception) {
            Log::error(report($exception));
            dd($exception);
            return redirect()->back();
        }

        return view('record.record-complete');
    }
}
