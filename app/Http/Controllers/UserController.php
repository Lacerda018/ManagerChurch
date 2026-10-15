<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return 'funcionou';
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        // Lógica para armazenar um novo usuário
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
        ]);

        $user = User::create($dados);
        Rule::unique('users', 'email')->whereNull('deleted_at');
        return response()->json($user, 201);
    }
}
