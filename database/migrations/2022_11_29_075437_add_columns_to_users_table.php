<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->string('address_line')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address_line');
            $table->string('state_or_province')->nullable()->after('city');
            $table->string('country')->nullable()->after('state_or_province');
            $table->string('postal_code')->nullable()->after('country');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
