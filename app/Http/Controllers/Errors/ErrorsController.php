<?php

namespace App\Http\Controllers\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorsController extends Controller
{

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
