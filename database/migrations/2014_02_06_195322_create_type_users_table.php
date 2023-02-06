<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('type_users', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->timestamps();
        });
        DB::table("type_users")->insert(
            [
                [
                    "libelle"=>"Medecin"
                ],
                [
                    "libelle"=>"Patient"
                ],
                [
                    "libelle"=>"Receptioniste"
                ],
                [
                    "libelle"=>"Laboratin"
                ]
                    
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_users');
    }
};
