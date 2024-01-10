<?php

declare(strict_types=1);

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        return view('record.list');
    }
}
