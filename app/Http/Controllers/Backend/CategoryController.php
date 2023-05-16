<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Categories\EditCategoriesRequest;
use App\Http\Requests\Backend\Categories\StoreCategoriesRequest;
use App\Http\Requests\Backend\Categories\UpdateCategoriesRequest;
use App\Models\Category;
// use App\Models\Categories;
use App\Services\CategoryService;
use Illuminate\Http\Request;

/**
 * Class CategoryController.
 */
class CategoryController
{
	/**
	 * CategoryController constructor.
	 *
	 * @param  CategoryController  $CategoryController
	 */
	public function __construct()
	{

	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('backend.categories.index');
	}



	public function store(StoreCategoriesRequest $request)
	{
		$this->CategoryController->store($request->except('_token', '_method'));
		return redirect()->route('admin.categories.index')->withFlashSuccess(__('alerts.categories.create'));
	}


	/**
	 * @param  UpdateCategoriesRequest  $request
	 * @param  Categories  $categories
	 *
	 * @return mixed
	 * @throws \Throwable
	 */
	public function update(UpdateCategoriesRequest $request, Categories $categories)
	{
		$this->CategoryController->update($categories, $request->except('_token', '_method'));
		return redirect()->route('admin.categories.index')->withFlashSuccess(__('alerts.categories.update'));
	}

}
