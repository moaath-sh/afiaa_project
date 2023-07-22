<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class consultationController extends Controller
{
    public function index()
    {
        $medicalRecords = consultation::all();

        return response()->json([
            'data' => $medicalRecords,
            'message' => 'Medical records retrieved successfully'
        ]);
    }
}
