<?php

use App\Models\User\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdFieldToUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->default(Role::USER);

            $table->foreign('role_id', 'user_role_id_fk')->references('id')->on('roles');
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign('user_role_id_fk');
            $table->dropColumn('role_id');
        });
    }
}
