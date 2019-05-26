<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalePanelLiteratureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locale_panel_literature', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('locale_id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('locale_id')->references('id')->on('locale_locales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locale_panel_literature');
    }
}
