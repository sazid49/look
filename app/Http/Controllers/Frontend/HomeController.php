<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Models\Reviews;
use App\Models\Category;
use App\Models\CMS;
use App\Services\Openhours;
use Carbon\Carbon;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap;
//use function compact;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $results = [];

	    // SitemapGenerator::create('https://lookon.at/')->maxTagsPerSitemap(20000)->writeToFile(public_path('sitemap.xml'));

        $latest_companies = Company::query()
            //->whereHas('gallery_show')
            ->whereNotNull('thumbnail')
            ->where('show_frontpage',1)
            ->with('category','gallery_show','ReviewRating')
            ->inRandomOrder()
            ->take(10)
            //->orderByDesc ('created_at')
            ->get();

        $company_category_list = Category::query()
            //->has('companies')
            ->where('featured',1)
            ->where('language',app()->getLocale())
            ->inRandomOrder()
            ->take(5)
            ->get();

        $jobs = JobApplication::query()
            ->where('active',1)
            ->where('start_date','<',now())
            ->where('expire_date','>',now())
            ->latest('expire_date')
            ->get();

        $reviews = Reviews::query()->latest()->take(6)->get();
        //dd($reviews);

        $users = User::query()->latest()->take(6)->get();

        //$aCms = CMS::query()->where('show_on_footer',1)->get();

        //dd($company_category_list);

//        foreach ($latest_companies as $index => $company) {
//            $opening_hours = $company->opening_hours;
//            $company->is_open = [];
//            if ($opening_hours) {
//                if (!empty($opening_hours) && $opening_hours != "" && $opening_hours != "null") {
//                    $spatieOpenHours = Openhours::getOpenHours($opening_hours ?? []);
//                    $company['is_open'] = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
//                }
//            }
//            $latest_companies[$index] = $company;
//        }

        //dd($latest_companies);

         return view('frontend.pages.home',compact('latest_companies','company_category_list','jobs','reviews','users'));
    }

	public function pages($cms = "") {
		$cms = CMS::query()->where('slug',$cms)->first();

		return view('frontend.pages.index')->withCms($cms);
	}
}
