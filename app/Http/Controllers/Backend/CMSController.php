<?php

namespace App\Http\Controllers\Backend;

use App\Models\CMS;
use App\Models\Tags;
use App\Models\Category;
use App\Services\CMSService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Arcanedev\Support\Validation\Rule;
use App\Http\Requests\Backend\CMS\EditCMSRequest;
use App\Http\Requests\Backend\CMS\StoreCMSRequest;
use App\Http\Requests\Backend\CMS\UpdateCMSRequest;
use App\Http\Requests\Backend\Tags\EditTagsRequest;
use App\Http\Requests\Backend\Tags\StoreTagsRequest;
use App\Http\Requests\Backend\Tags\UpdateTagsRequest;

/**
 * Class CMSController.
 */
class CMSController
{
	/**
	 * @var CMSService
	 */
	protected $CMSService;

	/**
	 * CategoryController constructor.
	 *
	 * @param  CMSService  $CMSService
	 */
	public function __construct(CMSService $CMSService)
	{
		$this->CMSService = $CMSService;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('backend.cms.index');
	}

	/**
     * @return View
     */
    public function create(): View
    {
        $categories = Category::query()->get();
        return view('backend.cms.create',compact('categories'));
    }

	public function store(StoreCMSRequest $request)
	{
		$this->CMSService->store($request->except('_token', '_method'));
		return redirect()->route('admin.cms.index')->withFlashSuccess(__('alerts.offer_field.create'));
	}

    /**
     * @param CMS $cms
     * @return View
     */
	public function edit(CMS $cms): View
	{
        $categories = Category::query()->get();

        return view('backend.cms.edit',compact('cms','categories'));
	}

	/**
	 * @param  UpdateCMSRequest  $request
	 * @param  CMS  $cms
	 *
	 * @return mixed
	 * @throws \Throwable
	 */
	public function update(UpdateCMSRequest $request, CMS $cms)
	{
		$this->CMSService->update($cms, $request->except('_token', '_method'));
		return redirect()->route('admin.cms.index')->withFlashSuccess(__('alerts.cms.update'));
	}

	public function show(EditCMSRequest $request, CMS $cms)
	{
		return view('backend.cms.show')
					->withCms($cms);
	}

	/**
	 * @param  CMS $cms
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function destroy(CMS $cms)
	{
		$this->CMSService->destroy($cms);

		return redirect()->route('admin.cms.index')->withFlashSuccess(__('alerts.cms.delete'));
	}
}
