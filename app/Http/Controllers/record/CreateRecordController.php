<?php

declare(strict_types=1);

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller as ControllersController;

class CreateRecordController extends ControllersController
{
    public function index()
    {
        return view('record.money-records');
    }
}
