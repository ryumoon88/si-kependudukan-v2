<?php

use App\Models\Service;
use App\Models\ServiceRequirement;
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
        Schema::create('service_has_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class, 'service_id');
            $table->foreignIdFor(ServiceRequirement::class, 'service_requirement_id');
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
        Schema::dropIfExists('service_has_requirements');
    }
};