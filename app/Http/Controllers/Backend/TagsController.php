<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Tags\EditTagsRequest;
use App\Http\Requests\Backend\Tags\StoreTagsRequest;
use App\Http\Requests\Backend\Tags\UpdateTagsRequest;
use App\Models\Category;
use App\Models\Tags;
use App\Services\TagsService;
use Illuminate\Http\Request;

/**
 * Class TagsController.
 */
class TagsController
{
	/**
	 * @var TagsService
	 */
	protected $tagsService;

	/**
	 * CategoryController constructor.
	 *
	 * @param  TagsService  $tagsService
	 */
	public function __construct(TagsService $tagsService)
	{
		$this->TagsService = $tagsService;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		return view('backend.tags.index');
	}

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
		$category = Category::query()->get();
        return view('backend.tags.create')->withCategory($category);
    }

	public function store(StoreTagsRequest $request)
	{
		$this->TagsService->store($request->except('_token', '_method'));
		return redirect()->route('admin.tags.index')->withFlashSuccess(__('alerts.tags.create'));
	}

	public function edit(EditTagsRequest $request, Tags $tag)
	{
		$category = Category::get();
		return view('backend.tags.edit')
			->withCategory($category)
			->withTag($tag);
	}

	/**
	 * @param  UpdateTagsRequest  $request
	 * @param  Tags  $tag
	 *
	 * @return mixed
	 * @throws \Throwable
	 */
	public function update(UpdateTagsRequest $request, Tags $tag)
	{
		$this->TagsService->update($tag, $request->except('_token', '_method'));
		return redirect()->route('admin.tags.index')->withFlashSuccess(__('alerts.tags.update'));
	}

	public function show(EditTagsRequest $request, Tags $tag)
	{
		return view('backend.tags.show')
					->withTag($tag);
	}

	/**
	 * @param  Tags $tag
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function destroy(Tags $tag)
	{
		$this->TagsService->destroy($tag);

		return redirect()->route('admin.tags.index')->withFlashSuccess(__('alerts.tags.delete'));
	}
}
