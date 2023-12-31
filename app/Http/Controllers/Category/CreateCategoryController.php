<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use illuminate\Support\Str;

class CreateCategoryController extends Controller
{
    public function index()
    {
        return view('category.create-category');
    }

    public function handle(Request $http_request)
    {
        $validate = $http_request->validate(
            [
                'category_name' => ['required', 'string', 'between:1,256'],
            ]
        );
        
        try {
            $category = Category::create(
                [
                    'category_id' => (string)Str::uuid(),
                    'category_name' => $validate['category_name'],
                    'user_id' => Auth::user()->user_id,
                ]
            );
        } catch (Exception $exception) {
            dd($exception);
            Log::error(report($exception));
            return redirect()->back();
        }

        return view('category.create-category-complete');
    }
}
