<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Keyword;
use App\Models\KeywordRefDate;
use Inertia\Inertia;
use Illuminate\Routing\Controller;
use App\Models\Post\Post;
use App\Models\Product\Product;
use App\Models\Service;
use App\Models\Slider\Slider;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $sliders = Slider::getByPosition('HOME_SLIDER');

            $posts = Post::query()
                ->active()
                ->activeCategories()
                ->where('is_featured', 1)
                ->orderByPosition()
                ->take(10)
                ->get()
                ->map(fn($item) => $item->transform());

            $services = Service::query()
                ->active()
                ->take(4)
                ->get()
                ->map(fn($item) => $item->transform());

            $data = [
                'sliders' => $sliders,
                'posts' => $posts,
                'services' => $services,
            ];

            if (request()->wantsJson()) {
                return response()->json($data);
            }

            return Inertia::render('Home', $data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function search()
    {
        try {
            if (request()->wantsJson()) {
                return response()->json([]);
            }

            if (request()->has('keyword') && !request()->has('page')) {

                $searchKeyword = Keyword::firstOrCreate(['keyword' => request()->input('keyword')]);
                $searchKeyword->update(['updated_at' => now()]);

                KeywordRefDate::create(['keyword_id' => $searchKeyword->id]);
            }

            return Inertia::render('Search', []);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function searchV2()
    {
        $filter = [
            'keyword' => request()->input('keyword'),
            'limit' => request()->input('limit') ?? 8
        ];

        $filterProduct = $filter;

        if (request()->has('page') && request()->has('type')) {
            switch (request()->input('type')) {
                case 'PRODUCT':
                    $filterProduct['page'] = request()->input('page');
                    $products = $this->searchProduct($filterProduct);

                    return response()->json([
                        'success' => true,
                        'data' => $products,
                        'message' => 'ok',
                    ], 200);
            }

            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'ok',
            ], 200);
        }

        $products = $this->searchProduct($filterProduct);

        $data = [
            'products' => $products
        ];

        if (request()->wantsJson()) {
            return response()->json($data);
        }
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'ok',
        ], 200);
    }

    public function searchProduct($filter)
    {
        return Product::query()
            ->active()
            ->filter($filter)
            ->paginate($filter['limit'] ?? 8)
            ->onEachSide(0)
            ->through(function ($item) {
                return $item->transform();
            })
            ->withQueryString();
    }
}
