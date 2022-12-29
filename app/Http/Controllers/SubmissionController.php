<?php

namespace App\Http\Controllers;

use App\DataTables\SubmissionDataTable;
use App\Models\Service;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubmissionDataTable $dataTable)
    {
        // $submission = Submission::find(5);
        // dd($submission);
        $services = Service::all();
        return $dataTable->render('admin.submission.index', ['sided' => false, 'services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $submission = Submission::find(1);
        // $submission->copyMedia(storage_path('statics/foto-ktp.pdf'))->toMediaCollection('foto-ktp');
        // dd($submission->getFirstMedia('foto-selfie')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        $sided = false;
        return view('admin.submission.show', compact('submission', 'sided'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }

    public function accept_submission(Submission $submission)
    {
        $submission->update(['status' => 'Accepted', 'accepted_by' => Auth::user()->id, 'accepted_at' => now()]);
        return redirect(route('admin.submission.show', ['submission' => $submission->ulid]))->with('alert', ['type' => 'success', 'message' => 'Submission accepted']);
    }

    public function deny_submission(Submission $submission)
    {
        $submission->update(['status' => 'Denied']);
        return redirect(route('admin.submission.show', ['submission' => $submission->ulid]))->with('alert', ['type' => 'success', 'message' => 'Submission denied']);
    }
}