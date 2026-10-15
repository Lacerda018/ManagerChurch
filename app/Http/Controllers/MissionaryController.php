<?php

namespace App\Http\Controllers;

use App\Models\Missionary;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MissionaryController extends Controller
{
    //
    public function index()
    {
        return 'funcionou';
    }

    public function show($missionary)
    {
        return 'Mostrando missionário com ID: ' . $missionary;
    }

    public function store(Request $request)
    {
        // Lógica para armazenar um novo missionário
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:missionaries,email',
            'phone' => 'nullable|string|max:20',
            'congregation_id' => 'required|exists:congregations,id',
            'gender' => 'required|in:male,female,other',
            'civil_status' => 'required|in:single,married,divorced,widowed',
            'age' => 'required|integer|min:18',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            
            // Adicione outras validações conforme necessário
        ]);
        $missionary = Missionary::create($dados);
        
        Rule::unique('missionaries', 'email')->whereNull('deleted_at');

        return response()->json($missionary, 201);
    }
}
