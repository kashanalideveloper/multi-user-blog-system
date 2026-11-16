<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 60)->nullable();
        });

        $usedUsernames = [];

        foreach (DB::table('users')->orderBy('id')->get(['id', 'name']) as $user) {
            $base = Str::limit(Str::slug($user->name), 45, '');
            $base = $base !== '' ? $base : 'user';
            $username = $base;
            $suffix = 2;

            while (isset($usedUsernames[$username])) {
                $ending = '-'.$suffix;
                $username = Str::substr($base, 0, 60 - Str::length($ending)).$ending;
                $suffix++;
            }

            $usedUsernames[$username] = true;
            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unique('username');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn('username');
        });
    }
};
