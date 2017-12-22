<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 16)->comment('标题');
            $table->string('content', 256)->comment('内容');
            $table->tinyInteger('validity', 1)->comment('激活状态')->default(0);
            $table->tinyInteger('default', 1)->comment('默认状态')->default('0');
            $table->timestamp('start_time')->comment('开始时间')->default(date("Y-m-d H:i:s"));
            $table->timestamp('end_time')->comment('结束时间')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
