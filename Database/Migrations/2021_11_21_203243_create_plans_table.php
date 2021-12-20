<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Upgrade\Entities\Plan;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->string('price');
            $table->string('period');
            $table->string('period_type')->default('Month');
            $table->timestamps();
        });

        $plans = [
            [
                'key' => "BASIC",
                'name' => 'BASIC',
                'price' => "09",
                'period' => "2"

            ],
            [
                'key' => "PROFESSIONAL",
                'name' => 'PROFESSIONAL',
                'price' => "29",
                'period' => "3"

            ],
            [
                'key' => "ADVANCED",
                'name' => 'ADVANCED',
                'price' => "39",
                'period' => "1"

            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
