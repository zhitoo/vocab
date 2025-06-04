<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $exerciseGeneration;
    protected $progressUpdate;

    public function __invoke(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::query()->where('email', $email)->first();

        abort_if(!$user, 401);
        abort_if(!\Illuminate\Support\Facades\Auth::attempt(['email' => $email, 'password' => $password]), 401);

        $token = $user->createToken($request->userAgent());

        return ['token' => $token->plainTextToken];
    }
}
