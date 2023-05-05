<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('email',50)->unique()->nullable();
            $table->integer('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',200);
            $table->unsignedSmallInteger('role_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->index('email','email');
            $table->index('mobile','mobile');
        });

        User::create([
            'name' => 'SuperAdmin',
            'email' => 'admin@exmaple.com',
            'mobile' => '01616008181',
            'password' => Hash::make(12345678),
            'role_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
