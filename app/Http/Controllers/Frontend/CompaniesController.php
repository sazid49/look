<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Company\Models\Company;
use App\Http\Controllers\Controller;
use App\Models\CantonData;
use App\Models\Category;
use App\Services\Openhours;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    public function index()
    {

        $category_list = Category::query()
            ->has('companies')
            ->where('language',app()->getLocale())
            ->orderBy('value')
            ->get();
            // dd($category_list);

        $cantons = CantonData::query()
            ->where('language',app()->getLocale())
            ->orderBy('iso')
            ->get();

        $companies = Company::query()
            ->where('active',1)
            ->where('published',1)
            ->paginate(9);

        return view('frontend.pages.companies',compact('companies','category_list','cantons'));
    }

    public function search(Request $request, Company $company)
    {
        $categories = $request->get('categories');
        $cantons = $request->get('cantons');

        $company = $company->newQuery()->with('ReviewRating','gallery_show');

        $search = $request->has('search') && $request->get('search');

        if($search){
            $s = $request->get('search');
            $terms = explode(' ',$s);
            foreach ($terms as $t){
                $company->where(function($query)use($t){
                    $query->where('company_name','like','%'.$t.'%')
                        ->orWhere('keywords','like','%'.$t.'%')
                        ->orWhere('address','like','%'.$t.'%')
                        ->orWhere('city','like','%'.$t.'%');
//                foreach ($terms as $t){
//                    $query->orWhere('address','like','%'.$t.'%');
//                };
//                foreach ($terms as $t){
//                    $query->orWhere('city','like','%'.$t.'%');
//                }
                });
            };
        }

        if($request->has('categories')){
            $company->whereHas('category',function($query)use($categories){
                $query->whereIn('category_id',$categories);
            });
        }

        if($request->has('cantons')){
            $company->whereIn('canton',$cantons);
        }

        $image = $request->get('image');
        if($image == 'true')
        {
            $company->whereNotNull('thumbnail');
        }

        $jobs = $request->get('jobs');
        if($jobs == 'true') {
            $company->whereHas('job_published');
        }

        $offer = $request->get('offer');
        if($offer == 'true') {
            $company->whereHas('companytabs',function($query){
                $query->where('show_interraction',1);
            });
        }

        $current_status = $request->current_status;

        $active = $request->get('active');
        if($active == 'true') {
            $company->where('active',1);
        }

        $updated = $request->get('updated');
        if($updated == 'true') {
            $company->where('updated_at', '>',now()->subMonth());
        }

        $open = $request->get('open');

        if($open == 'true'){
            $today = strtolower(now()->format('l'));
            $time = now()->format('H:i:s');
            $company->where(function($query)use($today,$time){
                $query->where(function($q)use($today,$time){
                    $q->where('opening_hours->'.$today.'->morning_from','<',$time)
                        ->where('opening_hours->'.$today.'->morning_to','>',$time);
                })->orWhere(function($r)use($today,$time){
                    $r->where('opening_hours->'.$today.'->afternoon_from','<',$time)
                        ->where('opening_hours->'.$today.'->afternoon_to','>',$time);
                });
            });
        }

        if($request->has('min') || $request->has('max')){
            if($request->get('min') != 0 || $request->get('max') != 5){
                $min = $request->get('min');
                $max = $request->get('max');
                $c = [];
                $companies = Company::query()
                    ->where('published',1)
                    ->where('active',1)
                    ->has('ReviewRating')
                    ->get();
                foreach ($companies as $com){
                    $o = rating($com->id);
                    if($o >= $min && $o <= $max){
                        $c []= $com->id;
                    }
                }
                $company->whereIn('id',$c);
            }
        }

        if($request->has('sorting') && $request->get('sorting') != ''){
            $sorting = $request->get('sorting');
            $order = $request->get('direction');
            $company->orderBy($sorting,$order);
        }

        if($request->has('qty')){
            $qty = $request->get('qty');
            $companies = $company->paginate($qty);
        } else {
            $companies = $company->paginate(9)->withQueryString();
        }

        if(!$request->ajax()){
            $category_list = Category::query()
                ->has('companies')
                ->where('language',app()->getLocale())
                ->get();

            $cantons = CantonData::query()
                ->where('language',app()->getLocale())
                ->get();

            return view('frontend.pages.companies',compact('companies','category_list','cantons'));
        }

        return view('frontend.pages._company',compact('companies','current_status'))->render();
    }

    public function companiesLatest(){

        $companies = Company::with('category')->limit(5)->orderByDesc ('created_at')->get();

        $results = array();
        foreach ($companies as $company) {
            $opening_hours = $company->opening_hours;
            $company = $company->toArray();
            $company['is_open'] =  false;
            if ($opening_hours) {
                if (!empty($opening_hours) && $opening_hours != "" && $opening_hours != "null") {
                    $spatieOpenHours = Openhours::getOpenHours($opening_hours ?? []);
                    $company['is_open'] = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
                }
            }
            $results[]=$company;
        }
        return view('frontend.pages.companies',compact('results'));
    }

    public function companiesCategory(Category $category)
    {
        $companies = Company::query()->where('category_id',$category->category_id)->get();

        $category_list = Category::all()->keyBy('category_id')->toArray ();

        $results = array();
        foreach ($companies as $key => $company) {

            $opening_hours = $company->opening_hours;
            $company = $company->toArray();
            $company['is_open'] =  [];
            if ($opening_hours) {
                if (!empty($opening_hours) && $opening_hours != "" && $opening_hours != "null") {
                    $spatieOpenHours = Openhours::getOpenHours($opening_hours ?? []);
                    $company['is_open'] = ($spatieOpenHours && $spatieOpenHours->isOpen()) ?? false;
                }
            }
            $companies[$key]=$company;
        }
        return view('frontend.pages.companies',compact('companies','category_list'));
    }

}
