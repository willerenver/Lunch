<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\Types\Nullable;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients',function(Blueprint $table){
                $table->increments('ClientID');
                $table->string('FirstName',40)->required();
                $table->string('LastName',40)->required();
                $table->string('Telephone',15)->nullable();
                $table->string('Email',150)->required();
                $table->integer('Age')->required();
                $table->string('Address',255)->nullable();;
                $table->boolean('IsFood')->default(0)->required();
                $table->string('Observation')->nullable();
                
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
