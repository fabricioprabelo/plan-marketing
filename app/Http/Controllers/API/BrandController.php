<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return response()->json([
            'error' => false,
            'data' => Brand::all(),
            'message' => ''
        ]);
    }
}
