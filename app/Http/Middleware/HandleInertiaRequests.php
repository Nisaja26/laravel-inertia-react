<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
                'flash' => [
                    'message' => fn () => $request->session()->get('message')
                ],
        ]);


        // penjelasan
        // funtion public berarti bisa diakses dari luar kelas
        // array_merge() digunakan untuk menggabungkan dua array
        // parent::share($request) menggabungkan data yang dibagikan oleh fungsi share() di kelas induk dengan data yang ditambahkan
        // kunci 'flash', berisi array yang memiliki dua elemen: 'message' dan 'success'
        // $request->session()->get('message') , 
        // berarti mengambil data dengan kunci 'message'
    }
}
