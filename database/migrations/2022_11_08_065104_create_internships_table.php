<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id');
            $table->string('telp');
            $table->string('birth');
            $table->string('religion');
            $table->string('occupational');
            $table->string('address');
            $table->string('members');
            $table->string('purpose');
            $table->string('description');
            $table->string('location');
            $table->string('institution');
            $table->string('letter_number')->nullable();
            $table->string('acc_reason')->nullable();
            $table->string('start_intern')->nullable();
            $table->string('end_intern')->nullable();
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
        Schema::dropIfExists('internships');
    }
};
