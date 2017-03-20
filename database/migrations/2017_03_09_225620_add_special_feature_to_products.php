<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecialFeatureToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('product_special_feature')->nullable();
            $table->integer('product_specification_pdf_id')->nullable();
            $table->integer('product_offer_pdf_id')->nullable();
            $table->integer('product_video_id')->nullable();

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

            $table->dropColumn('product_special_feature');
            $table->dropColumn('product_special_feature');
            $table->dropColumn('product_specification_pdf_id');
            $table->dropColumn('product_offer_pdf_id');
            $table->dropColumn('product_video_id');

        });
    }
}
