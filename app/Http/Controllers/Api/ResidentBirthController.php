<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ResidentBirth;
use Illuminate\Http\Request;

class ResidentBirthController extends Controller
{
    public function index(Request $request)
    {
        $id_number = $request->input('id');
        $resident = ResidentBirth::where('id', intval($id_number))->get();
        if ($resident != null) {
            return json_encode($resident);
        }
    }
}