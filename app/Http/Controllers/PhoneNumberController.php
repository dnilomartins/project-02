<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use Illuminate\Http\Request;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Requests\UpdatePhoneNumberRequest;

class PhoneNumberController extends Controller
{
    public function index(Request $request)
    {
        return PhoneNumber::all();
    }

    public function store(StorePhoneNumberRequest $request)
    {
        $phoneNumber = $request->validated();
        return PhoneNumber::create($phoneNumber);
    }

    public function show(PhoneNumber $phoneNumber)
    {
        return $phoneNumber;
    }

    public function update(UpdatePhoneNumberRequest $request, PhoneNumber $phoneNumber)
    {
        $phoneNumber->update($request->validated());
        return $phoneNumber;
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        $response = $phoneNumber->delete();
        return response()->json([
            'message' => $response ? 'Número de telefone deletado com sucesso!' : 'Erro ao deletar número de telefone!',
        ], $response ? 204 : 500);
    }
}
