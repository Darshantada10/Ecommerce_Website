<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            
            $table->json('attributes');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

/*

                category_id(foreign)
                brand_id(foreign)
                

                coupon
                
                // commmon
                name                        
                slug                        
                images
                videos
                description
                product_information
                status
                trending
                free delivery 



                // cannot be categorized until we have complete information
                original_price
                discounted_price


                // absoulutely no idea
                color
                quantity
                size


                baby clothes
                tshirt      color       quantity
                0-3months   red,pink    1000
                3-6months   red,pink    1000
                6-9months   red,pink    1000
                9-12months   red,pink    1000
                12-18months     red,pink    10000
                1-1.5years     red,pink    10000


                t shirt
                size        color       quantity
                m           red         200

                tshirt 
                size        color       quantity
                xl          na          300
                
                tshirt 
                size        color       quantity
                freesize    na          500
                
                tshirt 
                size        color               quantity
                oversize    red,black           200

                tshirt 
                size        color       quantity
                xl          na          500


                mobile
                model       color   quantity
                8gb         black   1000
                
                mobile
                model              color    quantity
                8gb +256gb         black    1000

                mobile
                model       color       quantity 
                na          red         1000

                helmet
                quantity
                2000

                helmet
                color   quantity
                black   2000







                // for digital marketing
                meta title (optimized for digital or online marketing)
                meta description (optimized for digital or online marketing)

            */


            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('brand_id');

            // 1st schema
            // $table->string('size')->nullable(); // eg:s,m,l
            // $table->string('color')->nullable(); // eg:red,pink,black
            // $table->string('model')->nullable(); //eg: 8+128,12+128,8+256
            // $table->string('quantity')->nullable();

            // 2nd schema
            // $table->string('attribute_1_type')->nullable(); // eg:size / color / model
            // $table->string('attribute_1_value')->nullable(); // eg:s,m,l / red,black / 8+128
            // $table->string('attribute_1_quantity')->nullable(); // eg:1000
            
            // $table->string('attribute_2_type')->nullable(); // eg:size / color / model
            // $table->string('attribute_2_value')->nullable(); // eg:s,m,l / red,black / 8+128
            // $table->string('attribute_2_quantity')->nullable(); // eg:1000

            // pros
            // flexible
            // easy query

            // cons
            // limited options
            // unused fields

            // 3rd schema
            // $table->json('attributes');

            //pros
            // highly future optimized
            // less columns

            // cons
            // complex query
            // one column will weigh more than others
            // custom logic


