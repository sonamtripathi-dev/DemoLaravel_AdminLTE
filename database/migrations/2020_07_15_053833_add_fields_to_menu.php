<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('menu_item')->unique();
            $table->string('menu_url')->unique();
            $table->integer('parent_menu_id');
            $table->decimal('order', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('menu_item');
            $table->dropColumn('menu_item');
            $table->dropColumn('parent_menu_id');
            $table->dropColumn('order');
        });
    }
}
