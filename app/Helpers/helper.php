<?php

use Illuminate\Support\Str;


if (!function_exists('failed_validation')) {
    /**
     * show validation message when validation fails
     *
     * @param Validation $error
     * @return void
     */
    function failed_validation($error)
    {
        return response()->json($error, 400);
    }
}

if (!function_exists('add_response')) {
    function add_response()
    {
        return response()->json([
            'status' => true,
            'data' => __('response.add_response_success')
        ], 200);
    }
}

if (!function_exists('update_response')) {
    function update_response()
    {
        return response()->json([
            'status' => true,
            'data' => __('response.update_response_success')
        ], 200);
    }
}

if (!function_exists('error_response')) {
    function error_response($message = null)
    {
        $message = $message != null ? $message : __('response.api_response_error');

        return response()->json([
            'status' => false,
            'message' => $message,
        ], 400);
    }
}

if (!function_exists('delete_response')) {
    function delete_response()
    {
        return response()->json([
            'status' => true,
            'message' => __('response.delete_response_success')
        ], 200);
    }
}

if (!function_exists('success_response')) {
    function success_response($message)
    {
        return response()->json($message, 200);
    }
}

if (!function_exists('aurl')) {
    function aurl($path)
    {
        return asset('admin-assets/' . $path);
    }
}

if (!function_exists('locale')) {
    function locale()
    {
        return app()->getLocale();
    }
}

if (!function_exists('sanctum')) {
    function sanctum()
    {
        return auth()->guard('sanctum');
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admins');
    }
}

if (!function_exists('api_response_success')) {
    function api_response_success($data)
    {
        return response()->json([
            'status' => true,
            'data' => $data,
        ], 200);
    }
}



if (!function_exists('api_response_error')) {
    function api_response_error($message = null)
    {
        $message = $message != null ? $message : __('response.api_response_error');

        return response()->json([
            'status' => false,
            'message' => $message,
        ], 400);
    }
}

if (!function_exists('module_path')) {
    function module_path($name, $path = '')
    {
        return app()->basePath() . DIRECTORY_SEPARATOR . 'Modules' . DIRECTORY_SEPARATOR . $name .  $path;
    }
}

if (!function_exists('admin_user')) {
    function admin_user()
    {
        return auth()->guard('admins')->user();
    }
}

if (!function_exists('generate_uuid')) {
    function generate_uuid(string $model)
    {
        $uuid = "";
        do {
            $uuid = Str::uuid();
        } while ($model::firstWhere("uuid", $uuid));

        return $uuid;
    }
}