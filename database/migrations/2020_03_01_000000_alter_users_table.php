<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('phone');
            $table->date('dateOfBirth');
            $table->unsignedDecimal('wallet')->default(100000);
            $table->boolean('isAdmin');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'dateOfBirth', 'wallet', 'isAdmin']);
        });
    }
}
