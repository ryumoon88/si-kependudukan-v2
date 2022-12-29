<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submission::factory(100)->create();

        foreach (Submission::all() as $submission) {
            foreach ($submission->service->requirements as $requirement) {
                $medianame = Str::slug($requirement->name);
                $submission->copyMedia(storage_path('statics/' . Str::slug($requirement->name)) . '.pdf')
                    ->toMediaCollection($medianame);
            }
        }
    }
}