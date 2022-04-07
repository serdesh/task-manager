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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description');
            $table->text('note');
            $table->text('status');
            $table->date('done_date')->default(null);
            $table->double('fixed_price')->default(null)->comment('Фиксированная сумма оплаты');
            $table->integer('time_spent')->default(0)->comment('Затраченное время, мин');
            $table->date('deadline')->default(null)->comment('Срок');
            $table->unsignedBigInteger('project_id')->index()->comment('Проект');
            $table->foreign('project_id')->references('id')->on('project')
                ->onDelete('CASCADE');
        });
        DB::statement("ALTER TABLE `task` comment 'Задачи'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropIndex(['project_id']);
        });
        Schema::dropIfExists('task');
    }
};
