<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\Resident;
use App\Models\ResidentBirth;
use App\Models\Submission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        $resident_birth_count = ResidentBirth::all()->count();
        $resident_count = Resident::all()->count();
        $submissions = Submission::orderBy('created_at', 'desc')->get();
        $submission_count = $submissions->count();
        $latestSubmission = $submissions->take(10);
        $sided = false;
        return $dataTable->render('admin.index', compact('sided', 'resident_birth_count', 'resident_count', 'submission_count', 'latestSubmission'));
    }
}