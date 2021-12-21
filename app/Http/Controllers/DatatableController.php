<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function roles()
    {
        return datatables()->of(User::all())->toJson();
    }
}
