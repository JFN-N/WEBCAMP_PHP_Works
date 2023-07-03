<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_recipes', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name', 128)->comment('料理名');
            $table->text('detail')->comment('料理の詳細');
            $table->unsignedTinyInteger('type')->comment('種類:(1:肉, 2:魚, 3:野菜, 4:その他)');
            $table->unsignedBigInteger('user_id')->comment('このタスクの所有者');
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            //$table->timestamps();
            $table->dateTime('created_at')->useCurrent()->comment('タスク完了日時');
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            //
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_recipes');
    }
}
