<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::when($request->name, function($query) use($request){
            $query->where('name', 'ILIKE', '%'. $request->name .'%');
        })
        ->when($request->order_by_name, function($query) use($request){
            $query->orderBy('name', $request->order_by_name);
        })
        ->get();
    }

    public function store(StoreUserRequest $request)
    {
        $user = $request->validated();
        return User::create($user);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return $user;
    }

    public function destroy(User $user)
    {
        $response = $user->delete();

        return response()->json([
            'message' => $response ? 'Usuário deletado com sucesso!' : 'Erro ao deletar usuário!',
        ], $response ? 204 : 500);
    }

    public function showUserInfos(User $user)
    {
        return $user->load('phoneNumber');
    }
}
