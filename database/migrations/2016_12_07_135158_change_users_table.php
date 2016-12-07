<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'login_name');
            $table->unique('login_name');
            $table->dropUnique('users_email_unique');
            $table->string('user_name')->after('name');
            $table->string('status')->after('email')->default('active');
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
            $table->dropColumn('status');
            $table->dropColumn('user_name');
            $table->unique('email');
            $table->dropUnique('users_login_name_unique');
            $table->renameColumn('login_name', 'name');
        });
    }
}
