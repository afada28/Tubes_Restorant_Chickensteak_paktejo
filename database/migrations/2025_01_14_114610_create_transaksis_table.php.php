<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  
  
class CreateTransaksisTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('transaksis', function (Blueprint $table) {  
            $table->id();  
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');  
            $table->integer('jumlah');  
            $table->decimal('total_harga', 10, 2);  
            $table->timestamps();  
        });  
    }  
  
    public function down()  
    {  
        Schema::dropIfExists('transaksis');  
    }  
}  
