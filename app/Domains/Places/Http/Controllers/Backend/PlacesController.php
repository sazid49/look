<?php

namespace App\Domains\Places\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Domains\Places\Services\PlaceService;
use App\Domains\Company\Http\Requests\Backend\EditCompanyRequest;
use App\Domains\Auth\Models\User;
use App\Domains\Places\Http\Requests\Backend\StorePlaceGalleryRequest;
use App\Domains\Places\Http\Requests\Backend\UpdatePlaceContactFormRequest;
use App\Domains\Places\Http\Requests\Backend\StorePlaceRequest;
use App\Domains\Places\Http\Requests\Backend\EditPlacesRequest;
use App\Domains\Places\Http\Requests\Backend\UpdatePlaceFinancePublishRequest;
use App\Domains\Places\Http\Requests\Backend\UpdatePlaceRequest;
use App\Domains\Places\Http\Requests\Backend\UpdatePlaceSeoRequest;
use App\Domains\Places\Models\Place;
use App\Domains\Places\Models\PlaceGallery;
use App\Models\CategoryPlace;
use App\Services\Openhours;
use Storage;

/**
 * Class PlacesController.
 */
class PlacesController extends Controller
{
    /**
     * @var PlaceService
     */
    protected $PlaceService;

    /**
     * CategoryController constructor.
     *
     * @param  PlaceService  $PlaceService
     */
    public function __construct(PlaceService $PlaceService)
    {
        $this->PlaceService = $PlaceService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.place.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        //dd(htmlLang());
        //dd(config('boilerplate.locale.status'));
        $role = Auth()->user()->roles[0]->name;
        $category = CategoryPlace::query()
            ->where('language',htmlLang())
            ->get();
        $allUsers1 = User::query()->whereHas('roles', function($q){
            $q->WhereNotIn('id',[2,3]);
        })->get();

        $open_hours_select =  [
            'selects' => Openhours::getOpeningHoursSelect([]),
            'days_of_week' => Openhours::$days_of_week
        ];

        return view('backend.place.create',['open_hours_select'=>$open_hours_select])->withCategory($category)->withRole($role)->withAllUsers1($allUsers1);
    }

    public function store(StorePlaceRequest $request)
    {
        $place = $this->PlaceService->store($request->except('_token', '_method'));
        return redirect()->route('admin.places.information',$place)->withFlashSuccess(__('alerts.place.create'));
    }

    public function edit(EditPlacesRequest $request, Place $place)
    {
        $role = Auth()->user()->roles[0]->name;
        $category = CategoryPlace::get();
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[2,3]);
        })->get();

        $open_hours_select =  [
            'selects' => Openhours::getOpeningHoursSelect($place->opening_hours ?? []),
            'days_of_week' => Openhours::$days_of_week
        ];

        return view('backend.place.edit',['open_hours_select'=>$open_hours_select])
            ->withPlace($place)
            ->withCategory($category)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    /**
     * @param  UpdatePlaceRequest  $request
     * @param  Place  $place
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $this->PlaceService->update($place, $request->except('_token', '_method'));

        return redirect()->route('admin.places.edit', $place)->withFlashSuccess(__('alerts.place.update'));
    }

    public function information(EditCompanyRequest $request, Place $place)
    {
        $role = Auth()->user()->roles[0]->name;
        $category = CategoryPlace::get();
        $allUsers1 = User::whereHas('roles', function($q){
            $q->WhereNotIn('id',[2,3]);
        })->get();

        $open_hours_select =  [
            'selects' => Openhours::getOpeningHoursSelect($place->opening_hours ?? []),
            'days_of_week' => Openhours::$days_of_week
        ];

        return view('backend.place.information',['open_hours_select'=>$open_hours_select])
            ->withPlace($place)
            ->withCategory($category)
            ->withRole($role)
            ->withAllUsers1($allUsers1);
    }

    public function updateInformation(UpdatePlaceRequest $request, Place $place)
    {
        $this->PlaceService->updateInformation($place, $request->except('_token', '_method'));
        return redirect()->back()->withFlashSuccess(__('alerts.place.information.update'));
    }

    public function contactForm(EditCompanyRequest $request, Place $place)
    {
        $role = Auth()->user()->roles[0]->name;
        return view('backend.place.contact_form')
            ->withPlace($place)
            ->withRole($role);
    }

    public function updateContactForm(UpdatePlaceContactFormRequest $request, Place $place)
    {
        $this->PlaceService->updateContactForm($place, $request->except('_token', '_method'));
        return redirect()->back()->withFlashSuccess(__('alerts.place.contact_form.update'));
    }

    /* public function gallery(EditCompanyRequest $request, Place $place)
    {
        $role = Auth()->user()->roles[0]->name;

        return view('backend.place.gallery')
                    ->withPlace($place)
                    ->withRole($role);
    }

    public function storeGallery(StorePlaceGalleryRequest $request, Place $place)
    {
        $this->CompanyService->storeGallery($request->except('_token', '_method'),$place);
        return redirect()->route('admin.place.gallery.index',$place)->withFlashSuccess(__('alerts.place.gallery.create'));
    }

    public function destroyGallery(Place $place, Gallery $place) {
        if (Storage::disk('public')->exists($gallery['image'])) {
            Storage::disk('public')->delete($gallery['image']);
        }

        $gallery->delete();
        return redirect()->route('admin.place.gallery.index',$place)->withFlashSuccess(__('alerts.company.gallery.delete'));
    } */

    public function editSeo(EditCompanyRequest $request, Place $place) {
        $role = Auth()->user()->roles[0]->name;
        return view('backend.place.seo')
            ->withPlace($place)
            ->withRole($role);
    }

    public function updateSeo(UpdatePlaceSeoRequest $request, Place $place)
    {
        $this->PlaceService->updateSeo($place,$request->except('_token', '_method'));
        return redirect()->back()->withFlashSuccess(__('alerts.place.seo.update'));
    }

    /**
     * @param  Place $place
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Place $place)
    {
        $this->PlaceService->destroy($place);

        return redirect()->route('admin.place.index')->withFlashSuccess(__('alerts.place.delete'));
    }
    public function gallery(EditPlacesRequest $request, Place $place)
    {
        $role = Auth()->user()->roles[0]->name;

        return view('backend.place.gallery')
            ->withPlace($place)
            ->withRole($role);
    }

    public function storeGallery(StorePlaceGalleryRequest $request, Place $place)
    {
        $this->PlaceService->storeGallery($request->except('_token', '_method'),$place);
        return redirect()->route('admin.places.gallery.index',$place)->withFlashSuccess(__('alerts.place.gallery.create'));
    }

    public function destroyGallery(Place $place, PlaceGallery $gallery) {
        if (Storage::disk('public')->exists($gallery['image'])) {
            Storage::disk('public')->delete($gallery['image']);
        }

        $gallery->delete();
        return redirect()->route('admin.places.gallery.index',$place)->withFlashSuccess(__('alerts.place.gallery.delete'));
    }
    public function updateFinancePublish(UpdatePlaceFinancePublishRequest $request, Place $place)
    {
        $this->CompanyService->updateFinancePublish($place, $request->except('_token', '_method'));

        return redirect()->back()->withFlashSuccess("Place updated successfully");
    }
}
