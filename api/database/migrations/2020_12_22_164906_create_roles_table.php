<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $roles = [
            [
                'id' => 1,
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'Moderator'
            ],
            [
                'id' => 3,
                'name' => 'User'
            ],
        ];

        DB::table('roles')->insert($roles);


    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
}
