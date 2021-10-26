<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeAttributeToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('guaranty')->default(0);
            $table->string('title_en')->nullable();
            $table->integer('viewed')->default(0);
            $table->integer('product_count')->default(0);
            $table->smallInteger('status')->default(1);
            $table->integer('product_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('guaranty');
            $table->dropColumn('title_en');
            $table->dropColumn('viewed');
            $table->dropColumn('product_count');
            $table->dropColumn('status');
            $table->dropColumn('product_order');
        });
    }
}
