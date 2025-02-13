<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'flash' => [
                'message' => fn() => $request->session()->get('message'),
                'status' => fn() => $request->session()->get('status'),
                'code' => fn() => $request->session()->get('code'),
            ],

            'auth' => [
                'user' => Auth::guard('admin')->check()
                    ? [
                        'id' => Auth::guard('admin')->id(),
                        'name' => Auth::guard('admin')->user()->name,
                        // 'email' => Auth::guard('admin')->user()->email,
                        'image' => Auth::guard('admin')->user()->image,
                        'type' => Auth::guard('admin')->user()->type ?? 'Admin',
                    ]
                    : null,
            ],
        ]);
    }
}
