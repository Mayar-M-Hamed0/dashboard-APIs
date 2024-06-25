<?php

namespace Modules\Auth\App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\App\Http\Requests\Dashboard\LoginRequest;
use Modules\Auth\App\Models\Admin;
use Modules\Auth\App\resources\Dashboard\LoginAdminResource;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $token = $admin->createToken('dashboard-login')->plainTextToken;
                return api_response_success([
                    'token' => $token,
                    'data' => new LoginAdminResource($admin),
                ]);
            } else {
                return api_response_error(__('auth.password'));
            }
        } else {
            return error_response('Email Not Found!');
        }
    }
}