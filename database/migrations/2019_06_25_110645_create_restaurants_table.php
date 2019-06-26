<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('restaurant_id');
            $table->dateTime('update_date');
            $table->text('name');
            $table->text('name_kana');
            $table->geometry('location');
            $table->text('category');
            $table->text('url');
            $table->text('shop_image1');
            $table->text('shop_image2');
            $table->text('address');
            $table->text('telephone');
            $table->text('open_time');
            $table->text('holiday');
            $table->text('access');
            $table->text('line');
            $table->text('station');
            $table->text('station_exit');
            $table->decimal('walk');
            $table->text('pr_short');
            $table->text('pr_long');
            $table->text('category_name');
            $table->decimal('budget');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
