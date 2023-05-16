<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\OfferField\EditOfferFieldRequest;
use App\Http\Requests\Backend\OfferField\StoreOfferFieldRequest;
use App\Http\Requests\Backend\OfferField\UpdateOfferFieldRequest;
use App\Models\Category;
use App\Models\OfferField;
use App\Models\OfferFieldGroup;
use App\Services\OfferFieldService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Session;
use Throwable;

/**
 * Class OfferFieldController.
 */
class OfferFieldController
{
	/**
	 * @var OfferFieldService
	 */
	protected $offerFieldService;

	/**
	 * CategoryController constructor.
	 *
	 * @param  OfferFieldService  $offerFieldService
	 */
	public function __construct(OfferFieldService $offerFieldService)
	{
		$this->offerFieldService = $offerFieldService;
	}

	/**
	 * @return Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('backend.offer_field.index');
	}

    /**
     * @return View
     */
    public function create(): View
    {
		$category = Category::query()
            ->where('language',app()->getLocale())
            ->get();
        return view('backend.offer_field.create',compact('category'));
    }

    /**
     * @param StoreOfferFieldRequest $request
     * @return RedirectResponse
     * @throws Throwable
     * @throws GeneralException
     */
	public function store(StoreOfferFieldRequest $request): RedirectResponse
    {
		$this->offerFieldService->store($request->except('_token', '_method'));
		return redirect()->route('admin.offer_field.index');
	}

    /**
     * @param OfferFieldGroup $offerFieldGroup
     * @return View
     */
	public function edit(OfferFieldGroup $offerFieldGroup): View
	{
		$category = Category::query()->get();
		return view('backend.offer_field.edit',compact('offerFieldGroup','category'));
	}

	/**
	 * @param  UpdateOfferFieldRequest  $request
	 * @param  OfferFieldGroup  $offerFieldGroup
	 *
	 * @return mixed
	 * @throws Throwable
	 */
	public function update(UpdateOfferFieldRequest $request, OfferFieldGroup $offerFieldGroup)
	{
		$this->offerFieldService->update($offerFieldGroup, $request->except('_token', '_method'));

		return redirect()->route('admin.offer_field.index')->withFlashSuccess(__('alerts.offer_field.update'));
	}

	/**
	 * @param  OfferField  $offerField
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function destroy(OfferField $offerField)
	{
		$this->offerFieldService->destroy($offerField);

		return redirect()->route('admin.offer_field.index')->withFlashSuccess(__('alerts.offer_field.delete'));
	}
}
