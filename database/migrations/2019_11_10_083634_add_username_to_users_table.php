<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('gender')->nullable()->index();
            $table->dateTime('dob')->nullable()->index();
            $table->boolean('dead')->default(false)->index();
            $table->dateTime('dod')->nullable();
            $table->dropUnique(['email']);
            $table->string('email')->nullable()->index()->change();
            $table->string('password')->nullable()->change();
            $table->softDeletes();
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
            $table->dropSoftDeletes();
            $table->string('password')->change();
            $table->string('email')->unique()->change();
        });
        // we separate to support sqlite database which doesn't support multiple
        // dropColumn/renameColumn in a single modification
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dod', 'dead', 'dob', 'gender', 'phone', 'username']);
        });
    }
}
