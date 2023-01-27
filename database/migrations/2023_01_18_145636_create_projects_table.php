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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('slug', 105)->unique();

            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->cascadeOnDelete();

            $table->string('client_name', 100);
            $table->text('summary')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('original_cover_image')->nullable();

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
        Schema::dropIfExists('projects');
    }
};
