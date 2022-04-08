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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->index();
            $table->foreign('project_id')->references('id')->on('project')
                ->onDelete('CASCADE');
            $table->date('date')->nullable()->comment('Дата платежа');
            $table->double('amount')->default(0)->comment('Сумма, руб.');
        });
        DB::statement("ALTER TABLE `payment` comment 'Оплата'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropIndex(['project_id']);
        });
        Schema::dropIfExists('payment');
    }
};
