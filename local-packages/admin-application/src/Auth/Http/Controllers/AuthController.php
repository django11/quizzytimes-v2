<?php declare(strict_types=1);

namespace QuizzyTimes\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use QuizzyTimes\Admin\Auth\Http\Resources\AdminResource;

/**
 * Class AuthController
 * @package QuizzyTimes\Admin\Auth\Http\Controllers
 */
class AuthController
{
    /**
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|string|null
     */
    public function __invoke(Request $request)
    {
        if(!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return response()->json([
                'status_code' => Response::HTTP_UNAUTHORIZED,
                'message' => 'Unauthorized',
            ]);
        }

        return response()->json(['message' => 'Success'])->setStatusCode(Response::HTTP_OK);
    }
}
