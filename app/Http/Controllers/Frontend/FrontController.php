<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use App\Http\Controllers\Controller;
use App\Models\AsUser;
use App\Models\Category;
use App\Models\CompanyJob;
use App\Domains\Company\Models\Reviews;
use App\Repositories\FacetedRepository;
use Illuminate\Http\Request;
use App\Domains\Places\Models\Place;
use App\Services\Openhours;

class FrontController extends Controller
{
    /**
     * @var FacetedRepository
     */
    private $repository;

    public function __construct(FacetedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
		$current_status = "";
		$search_word = $request->q ?? "";
        $listings = Company::query()->paginate(6);
        $repository = $this->repository;
        return view('frontend.company.index',compact('repository','listings','search_word','current_status'));
    }

//    public function faceted(Request $request, Company $company)
//    {
//        $search = $request->get('search');
//        $categories = $request->get('categories');
//
//        $company = $company->newQuery();
//
//        $company->where('show_frontpage','1');
//
//        if($request->has('search') && $request->get('search') != null){
//            $company->where(function($query) use ($search){
//                 $query->where('company_name','like','%'.$search.'%')
//                 ->orWhereHas('category',function($query) use($search){
//                     $query->where('value','like','%'.$search.'%');
//                    })
//                    ->orWhere('address','like','%'.$search.'%');
//            });
//        }
//
//        if($request->has('categories')){
//            $company->whereIn('category_id',$categories);
//        }
//
//		$only_with_image = $request->only_with_image;
//        if($only_with_image == 1) {
//            $company->whereHas('gallery');
//        }
//
//		$free_jobs = $request->free_jobs;
//        if($free_jobs == 1) {
//            $company->whereHas('companytabs',function($query) use($free_jobs){
//				$query->where('show_jobs',$free_jobs);
//			});
//        }
//
//		$quotation_form = $request->quotation_form;
//        if($quotation_form == 1) {
//            $company->whereHas('companytabs',function($query) use($quotation_form){
//				$query->where('show_interraction',$quotation_form);
//			});
//        }
//
//		$current_status = $request->current_status;
//
//		$status = $request->status;
//        if($status != "") {
//            $company->where('active',$status);
//        }
//
//		$upto_date = $request->upto_date;
//        if($upto_date == 1) {
//            $company->where('updated_at', '>', now()->subDays(30)->endOfDay());
//        }
//
//		$has_in_canton = $request->has_in_canton;
//        if($has_in_canton == 1) {
//            $company->where('canton', '!=', "");
//        }
//
//        if($request->has('sorting') && $request->get('sorting') != ''){
//            $sorting = $request->get('sorting');
//            $order = $request->get('direction');
//            $company->orderBy($sorting,$order);
//        }
//
//        if($request->has('qty')){
//            $qty = $request->get('qty');
//            $companies = $company->paginate($qty);
//        } else {
//            $companies = $company->paginate(9);
//        }
//
//        return view('frontend.company.company',compact('companies','current_status'))->render();
//
//    }

    public function loadCat(Request $request)
    {
        $categories = $request->get('categories');
        $totalItem = Category::query()->count(); // Get total categories
        $moreCats = Category::query()
            ->orderBy('value')
            ->offset($categories)
            ->limit(5)
            ->pluck('value','id');
        $result = [];
        foreach($moreCats as $key => $cat){
            $id = $totalItem <= ((int)$categories + 5) ? 'last-cat' : '';
            $result[] = '<li><input class="category" id="'.$id.'" name="'.$cat.'" type="checkbox" value="'.$key.'"><label for="'.$cat.'">&nbsp;&nbsp;'.$cat.'</label><span>&nbsp;('.Category::query()->find($key)->companies->count().')</span></li>';
        }

        return $result;
    }

    public function jobs()
    {
        $jobs = CompanyJob::query()->get();
        return view('frontend.pages.jobs',compact('jobs'));
    }

    public function users()
    {
        $users = AsUser::query()
            ->where('type','user')
            ->where('active',1)
            ->latest()
            ->limit(10)
            ->get();
        return view('frontend.pages.users',compact('users'));
    }

    public function reviews()
    {
        $reviews = Reviews::query()->get();
        return view('frontend.pages.reviews',compact('reviews'));
    }

    public function placesList(Request $request)
    {

        $search_word = $request->q ?? "";
        $listings = Place::query()->paginate(6);
        $repository = $this->repository;

        return view('frontend.places.index',compact('repository','listings','search_word'));
    }

    public function facetedPlace(Request $request, Place $place)
    {
        $search = $request->get('search');
        $categories = $request->get('categories');

        $place = $place->newQuery();

        if($request->has('search') && $request->get('search') != null){
            $place->where(function($query) use ($search){
                 $query->where('place_name','like','%'.$search.'%')
                 ->orWhereHas('category',function($query) use($search){
                     $query->where('value','like','%'.$search.'%');
                    })
                    ->orWhere('address','like','%'.$search.'%');
            });
        }

        if($request->has('categories')){
            $place->whereIn('category_id',$categories);
        }

        if($request->has('sorting') && $request->get('sorting') != ''){
            $sorting = $request->get('sorting');
            $order = $request->get('direction');
            $place->orderBy($sorting,$order);
        }

        if($request->has('qty')){
            $qty = $request->get('qty');
            $listings = $place->paginate($qty);
        }else{
            $listings = $place->paginate(6);
        }

        return view('frontend.places.place',compact('listings'))->render();

    }

    public function loadPlacesCat(Request $request)
    {
        $categories = $request->get('categories');
        $totalItem = Category::query()->count(); // Get total categories
        $moreCats = Category::query()
            ->orderBy('value')
            ->offset($categories)
            ->limit(5)
            ->pluck('value','id');
        $result = [];
        foreach($moreCats as $key => $cat){
            $id = $totalItem <= ((int)$categories + 5) ? 'last-cat' : '';
            $result[] = '<li><input class="category" id="'.$id.'" name="'.$cat.'" type="checkbox" value="'.$key.'"><label for="'.$cat.'">&nbsp;&nbsp;'.$cat.'</label><span>&nbsp;('.Category::query()->find($key)->places->count().')</span></li>';
        }

        return $result;
    }






}
