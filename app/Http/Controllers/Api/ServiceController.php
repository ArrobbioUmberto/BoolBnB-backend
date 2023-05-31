<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $results = Service::all();
        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }
}
