<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            $table->string('target_url')->index();
            $table->string('key', 42)->unique();
            $table->smallInteger('redirect_code')->unsigned()->nullable();
            $table->boolean('is_one_time')->default(false);
            $table->timestamp('first_visit_at')->nullable()->index();
            $table->timestamp('active_from')->nullable()->index();
            $table->timestamp('active_to')->nullable()->index();
            $table->json('tracking_data')->nullable();
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
        Schema::dropIfExists('short_urls');
    }
};
