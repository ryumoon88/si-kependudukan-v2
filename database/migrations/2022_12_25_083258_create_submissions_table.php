<?php

use App\Models\Resident;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'submitter_id');
            $table->foreignIdFor(Service::class);
            $table->enum('status', ['Reviewing', 'Denied', 'Accepted']);
            $table->foreignIdFor(User::class, 'accepted_by')->nullable()->default(null);
            $table->dateTime('accepted_at')->nullable();
            $table->ulid('ulid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
};