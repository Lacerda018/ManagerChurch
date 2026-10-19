<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tabelas = ['users', 'missionaries'];

    public function up(): void
    {
        foreach ($this->tabelas as $tabela) {
            // 1) nova coluna, nullable por enquanto
            Schema::table($tabela, function (Blueprint $table) {
                $table->foreignId('congregation_id')
                    ->nullable()
                    ->after('gender')
                    ->constrained()
                    ->restrictOnDelete();
            });

            // 2) copia os dados antigos para a nova tabela e liga os registros
            $nomes = DB::table($tabela)
                ->whereNotNull('congregation')
                ->distinct()
                ->pluck('congregation');

            foreach ($nomes as $nome) {
                $id = DB::table('congregations')->where('name', $nome)->value('id')
                    ?? DB::table('congregations')->insertGetId([
                        'name'       => $nome,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                DB::table($tabela)
                    ->where('congregation', $nome)
                    ->update(['congregation_id' => $id]);
            }

            // 3) remove a coluna de texto
            Schema::table($tabela, function (Blueprint $table) {
                $table->dropColumn('congregation');
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tabelas as $tabela) {
            Schema::table($tabela, function (Blueprint $table) {
                $table->string('congregation')->nullable();
            });

            DB::table($tabela)
                ->join('congregations', 'congregations.id', '=', "$tabela.congregation_id")
                ->update(["$tabela.congregation" => DB::raw('congregations.name')]);

            Schema::table($tabela, function (Blueprint $table) {
                $table->dropConstrainedForeignId('congregation_id');
            });
        }
    }
};

