<?php

namespace App\Http\Controllers;

use App\DataTables\SubmissionDataTable;
use App\Models\Service;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

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
        $selected_service = request()->get('service');
        $selected_service = Service::where('slug', $selected_service)->first();
        $services = Service::all();
        return view('user.submission.create', compact('services', 'selected_service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->files);
        $service_id = $request->input('service_id');
        $service = Service::find($service_id);
        if ($service == null)
            return redirect()->back()->with('alert', ['type' => 'danger', 'message' => 'Invalid service!']);

        $rules = [
            'service_id' => 'required',
        ];

        foreach ($request->files->keys() as $key) {
            $rules = Arr::add($rules, "$key", 'required');
        }

        // dd($rules);

        $validatedData = $request->validate($rules);
        $validatedData['submitter_id'] = Auth::user()->resident->id;
        $validatedData['status'] = 'Reviewing';
        $validatedData['ulid'] = Ulid::generate(now());

        foreach ($request->files->keys() as $key) {
            Arr::forget($validatedData, $key);
        }

        $submission = Submission::create(
            $validatedData
        );

        foreach ($request->files->keys() as $key) {
            $submission->addMediaFromRequest($key)->toMediaCollection($key);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Submission created, please wait until administrator respond to your request!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission,)
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