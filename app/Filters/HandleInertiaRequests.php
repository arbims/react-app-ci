<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\Request;
use Config\Services;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware implements FilterInterface
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \CodeIgniter\HTTP\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \CodeIgniter\HTTP\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $session = Services::session();
        $user = $session->get('user');
        return array_merge(parent::share($request), [
            'csrf' => csrf_hash(),
            'auth' => function () use ($user) {
                return [ 'user' => $user];
            },
            'flash' => function () {
                return [
                    'success' => session()->get('success'),
                    'error' => session()->get('error'),
                    'newData' => session()->get('newData')
                ];
            },
            'errors' => session()->get('errors')
        ]);
    }
}