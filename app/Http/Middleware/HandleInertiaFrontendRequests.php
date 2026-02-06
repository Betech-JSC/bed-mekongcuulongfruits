<?php

namespace App\Http\Middleware;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Inertia\Middleware;
use Illuminate\Http\Request;
use JamstackVietnam\Blog\Models\PostCategory;
use App\Models\Service;
use JamstackVietnam\MetaPage\Models\MetaPage;

class HandleInertiaFrontendRequests extends Middleware
{
    protected $rootView = 'frontend::app';
    protected const FEATURED_POSITION_POST_CATEGORIES = 1;
    protected const MENU_POSITION_POST_CATEGORIES = 2;

    public function share(Request $request)
    {
        try {
            $products = Product::query()
                ->active()
                ->get();

            $relativeUrl = str_replace(env('APP_URL'), '',  url()->current());
            $metaPage = cache_response(
                $relativeUrl,
                function () use ($relativeUrl) {
                    return MetaPage::where('url', $relativeUrl ?: '/')->first();
                },
                'meta_pages',
            );


            $global = settings()
                ->group('general')
                ->all();

            if ($request->wantsJson()) {
                return parent::share($request);
            }

            $share = array_merge(parent::share($request), [
                'global' => $global,
                'locale' => [
                    'current' => current_locale(),
                    'default' => config('app.locale'),
                    'list' => config('app.locales'),
                ],
                'route' => [
                    'url' => $request->url(),
                    'path' => $request->path(),
                    'name' => $request->route()->getName(),
                    'query' => $request->query(),
                ],
                'data' => [
                    'products' => $products,
                ]
            ]);

            if ($metaPage) {
                $share['seo'] = $metaPage;
            }

            return $share;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
