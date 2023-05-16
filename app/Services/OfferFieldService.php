<?php

namespace App\Services;

use App\Models\OfferFieldGroup;
use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Models\OfferField;
use Session;

/**
 * Class OfferFieldService.
 */
class OfferFieldService extends BaseService
{
    /**
     * OfferFieldService constructor.
     *
     * @param  OfferField  $offerField
     */
    public function __construct(OfferField $offerField)
    {
        $this->model = $offerField;
    }

    /**
     * @param  array  $data
     *
     * @return OfferField
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): OfferField
    {
        DB::beginTransaction();
        try {
            $group = OfferFieldGroup::query()->create([
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
                $offerField = OfferField::query()->create($insertData);
            }

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the record.'));
        }

        DB::commit();
        //Session::flash('success',__('alerts.offer_field.create'));
        return $offerField;
    }

    /**
     * @param  OfferFieldGroup  $offerFieldGroup
     * @param  array  $data
     *
     * @return OfferFieldGroup
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(OfferFieldGroup $offerFieldGroup, array $data = []): OfferFieldGroup
    {
        DB::beginTransaction();
        try {
            $group = $offerFieldGroup->update([
                    'category_id' => $data['category_id'],
                    'is_required' => $data['is_required'],
                    'type' => $data['type'],
                    'active' => 1
                ]
            );

            $fields = $offerFieldGroup->offerFields;

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
        return $offerFieldGroup;
    }

    /**
     * @param  OfferField  $offerField
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(OfferField  $offerField): bool
    {
        if ($this->deleteById($offerField->id)) {
            $offerField->is_deleted = 1;
            $offerField->save();
            return true;
        }
        throw new GeneralException(__('There was a problem deleting the record.'));
    }

    /**
     * @param  OfferField  $offerField
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy2(OfferField  $offerField): bool
    {
        if ($offerField->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }
}
