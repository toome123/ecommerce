<?php namespace Toomeowns\Ecommerce\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProdCatTable extends Migration
{

    public function up()
    {
        Schema::create('toomeowns_ecommerce_prod_cat', function ($table) {
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->primary(['product_id', 'category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('toomeowns_ecommerce_prod_cat');
    }
}
