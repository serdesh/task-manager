<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('url')->nullable();
            $table->unsignedBigInteger('customer_id')->index();
        });
        Schema::table('project', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')
                ->on('customer')->onDelete('CASCADE');
        });
        DB::statement("ALTER TABLE `project` comment 'Проекты'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropIndex(['customer_id']); // Удаление индекса 'customer_id_index'
        });
        Schema::dropIfExists('project');
    }
};
