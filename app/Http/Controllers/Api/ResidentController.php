<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index(Request $request)
    {
        $id_number = $request->input('id');
        $resident = Resident::with('birth:id,name')->where('id_card_number', 'LIKE', "%$id_number%")->get();
        if ($resident != null) {
            return json_encode($resident);
        }
    }
}