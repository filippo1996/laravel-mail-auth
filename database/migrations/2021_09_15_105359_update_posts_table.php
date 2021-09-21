<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // prepariamo la colonna per la foreign Key - può avere il campo null - creare la colonna dopo quella id del post
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('category_id');
        });
    }
}
