<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Sale;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->enum('estado',[Sale::ACEPTADO,Sale::PENDIENTE,Sale::RECHASADO,Sale::ANULADO]);
            $table->string('comprobante_type');
            $table->float('impuesto');
            $table->float('descuento');
            $table->string('comprobante_serie');
            $table->string('comprobante_num');
            $table->float('total');
            $table->json('contenido');
            $table->text('observacion')->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
}
