<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('clients_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign("client_id")->references("id")->on("clients");

            $table->unsignedBigInteger('service_id');
            $table->foreign("service_id")->references("id")->on("services");

            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('clients_services');
    }
};
