<?php

namespace App\Http\Middleware;

use App\Models\MarketingCoupon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
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
            if ($coupon->num_of_transactions < $coupon->user->marketingLevel->max_transactions)
                return $next($request);
            else
                return redirect()->route('home')->with('error', __('errors.this coupon has exceed the maximum number of transactions'));
        else
            return abort(404);
    }
}
