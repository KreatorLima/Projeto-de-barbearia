<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedulings', function (Blueprint $table) {
            $table->id(); // ID autoincremento
            
            // Relacionamento com o usuário/cliente (chave estrangeira)
            // Assume que você tem a tabela padrão 'users' do Laravel
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('name');
            $table->string('phone');
            $table->string('barber');
            
            // Dados do agendamento
            $table->date('date'); // Data do agendamento (AAAA-MM-DD)
            $table->time('time'); // Horário do agendamento (HH:MM:SS)
            
            // Informações adicionais
            $table->string('service'); // Nome do serviço (ex: "Corte de cabelo", "Consulta")
            $table->text('notes')->nullable(); // Observações opcionais
            
            // Status do agendamento (pendente, confirmado, cancelado)
            $table->string('status')->default('pending'); 
            
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedulings');
    }
};
