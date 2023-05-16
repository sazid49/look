<?php

namespace App\Services;

use App\Models\CategoryGroup;
use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Models\Category;
use Session;

/**
 * Class CategoryService.
 */
class CategoryService extends BaseService
{
    /**
     * CategoryService constructor.
     *
     * @param  Category  $Category
     */
    public function __construct(Category $Category)
    {
        $this->model = $Category;
    }

    /**
     * @param  array  $data
     *
     * @return Category
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Category
    {
        DB::beginTransaction();
        try {
            $group = CategoryGroup::query()->create([
                    'category_id' => $data['category_id'],
                    'is_required' => $data['is_required'],
                    'type' => $data['type'],
                    'active' => 1
                ]
            );

            $languages = ['de','fr','it','en'];

            foreach ($languages as $language){
                $insertData = [
                    'group_id' => $group->id,
                    'label' => $data['label'][$language],
                    'language' => $language,
                    'is_deleted' => 0
                ];
                if($data['type'] == "dropdown" || $data['type'] == "checkbox" || $data['type'] == "radio") {
                    $insertData['option'] = json_encode($data['option'][$language]);
                }
                //dd($insertData);
                $Category = Category::query()->create($insertData);
            }

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the record.'));
        }

        DB::commit();
        //Session::flash('success',__('alerts.offer_field.create'));
        return $Category;
    }

    /**
     * @param  CategoryGroup  $CategoryGroup
     * @param  array  $data
     *
     * @return CategoryGroup
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(CategoryGroup $CategoryGroup, array $data = []): CategoryGroup
    {
        DB::beginTransaction();
        try {
            $group = $CategoryGroup->update([
                    'category_id' => $data['category_id'],
                    'is_required' => $data['is_required'],
                    'type' => $data['type'],
                    'active' => 1
                ]
            );

            $fields = $CategoryGroup->Category;

            foreach ($fields as $field){
                $insertData = [
                    'label' => $data['label'][$field->language],
                ];

                if($data['type'] == "dropdown" || $data['type'] == "checkbox" || $data['type'] == "radio") {
                    $insertData['option'] = json_encode($data['option'][$field->language]);
                } else {
                    $insertData['option'] = "";
                }

                $field->update($insertData);
            }

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the record.'));
        }

        DB::commit();
        return $CategoryGroup;
    }

    /**
     * @param  Category  $Category
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Category  $Category): bool
    {
        if ($this->deleteById($Category->id)) {
            $Category->is_deleted = 1;
            $Category->save();
            return true;
        }
        throw new GeneralException(__('There was a problem deleting the record.'));
    }

    /**
     * @param  Category  $Category
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy2(Category  $Category): bool
    {
        if ($Category->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }
}
