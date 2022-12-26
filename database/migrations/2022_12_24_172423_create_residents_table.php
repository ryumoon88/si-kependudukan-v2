<?php

use App\Models\ResidentBirth;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ResidentBirth::class)->nullable();
            $table->char('id_card_number', 16);
            $table->string('email');
            $table->char('phone_number', 26);
            $table->enum('religion', ['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->string('address');
            $table->ulid('ulid');
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(District::class);
            $table->foreignIdFor(Village::class);
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
        Schema::dropIfExists('residents');
    }
};