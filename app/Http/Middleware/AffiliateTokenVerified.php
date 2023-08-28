<?php

namespace App\Http\Middleware;

use App\Models\MarketingCoupon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AffiliateTokenVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $coupon = MarketingCoupon::where('token', $request->route('token'))->first();
        if ($coupon)
            return $next($request);
        else
            return abort(404);
    }
}
