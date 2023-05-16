<?php

namespace App\Services;

use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Models\CMS;

/**
 * Class CMSService.
 */
class CMSService extends BaseService
{
    /**
     * CMSService constructor.
     *
     * @param  CMS  $CMS
     */
    public function __construct(CMS $CMS)
    {
        $this->model = $CMS;
    }

    /**
     * @param  array  $data
     *
     * @return CMS
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): CMS
    {
        DB::beginTransaction();
        try {
            $insertData = [
                'category_id' => $data['category'],
                'title' => $data['title'],
                'content' => $data['content'],
                'language' => $data['language'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'slug' => $data['slug'],
                'position' => $data['position'] ?? 1,
                'show_on_footer' => $data['show_on_footer'] ?? 0,
                'active' => $data['active'] ?? 1,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ];

            $CMS = $this->model::create($insertData);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the record.'));
        }

        DB::commit();
        return $CMS;
    }

    /**
     * @param  CMS  $cms
     * @param  array  $data
     *
     * @return CMS
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(CMS $cms, array $data = []): CMS
    {
        DB::beginTransaction();
        try {
            $cms->update([
                'category_id' => $data['category'],
                'title' => $data['title'],
                'content' => $data['content'],
                'language' => $data['language'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'slug' => $data['slug'],
                'position' => $data['position'] ?? 1,
                'show_on_footer' => $data['show_on_footer'] ?? 0,
                'active' => $data['active'] ?? 1,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the record.'));
        }

        DB::commit();
        return $cms;
    }

    /**
     * @param  CMS  $cms
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(CMS  $cms): bool
    {
        if ($this->deleteById($cms->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }

}
