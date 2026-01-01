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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->string('display_name')->after(column: 'last_name');
            $table->string('gender')->after('last_name');
            $table->string('phone_number')->after('email');
            $table->date('birth_date')->after('phone_number');
            $table->smallInteger('status')->default(1)->after('password');
            $table->timestamp('last_sign_in_at')->nullable()->after('updated_at');
            $table->string('last_sign_in_ip', 45)->nullable()->after('last_sign_in_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name', 
                'last_name', 
                'gender',
                'display_name', 
                'phone_number', 
                'birth_date',
                'status',
                'last_sign_in_at',
                'last_sign_in_ip',
                'deleted_at'
            ]);
        });
    }
};