<?php

namespace App\Http\Controllers;

use App\Models\Congregation;
use Illuminate\Http\Request;

class CongregationController extends Controller
{
    //
    public function index()
    {
        return 'funcionou';
    }

    public function show($congregation)
    {
        return 'Mostrando congregação com ID: ' . $congregation;
    }

    public function store(Request $request)
    {
        // Lógica para armazenar uma nova congregação
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            // Adicione outras validações conforme necessário
        ]);

        $congregation = Congregation::create($dados);

        return response()->json($congregation, 201);
    }
}
