<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Kiểm tra nếu người dùng không đăng nhập hoặc không có vai trò là admin
        if (!$user || $user->roles !== 2) {
            return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
