<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // creo il vincolo di foreign key
            // after id per dire di metterlo dopo la colonna id nel db
            $table->unsignedBigInteger('type_id')->after('id')->nullable();
            // foreign su type id che è la colonna, fai riferimento alla colonna id sulla tabella types
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // nella tabella projects c'è un vincolo di foreign key in catgory_id che si chiama id
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};
