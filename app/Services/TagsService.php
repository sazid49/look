<?php

namespace App\Services;

use Exception;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Models\Tags;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Storage;

/**
 * Class TagsService.
 */
class TagsService extends BaseService
{
    /**
     * TagsService constructor.
     *
     * @param  Tags  $Tags
     */
    public function __construct(Tags $Tags)
    {
        $this->model = $Tags;
    }

    /**
     * @param  array  $data
     *
     * @return Tags
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Tags
    {
        //dd($data);
        DB::beginTransaction();
        try {
			$image = "";
			if (!empty($data['image'])) {
				$val = $data['image'];
				if (!empty($val)) {
					$image = $val->store('/tags_image', 'public');
				}
			}

			$insertData = [
                'value' => $data['value'],
                //'category_id' => $data['category_id'],
                'image' => $image,
                'description' => $data['description'],
            ];

            $Tags = $this->model::query()->create($insertData);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the record.'));
        }

        DB::commit();
        return $Tags;
    }

    /**
     * @param  Tags  $Tags
     * @param  array  $data
     *
     * @return Tags
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Tags $tag, array $data = []): Tags
    {
        //  dd($data);

        DB::beginTransaction();
        try {

			// $image = $tag->image;
			// if (!empty($data['image'])) {
			// 	$val = $data['image'];
			// 	if (!empty($val)) {
			// 		$image = $val->store('/tags_image', 'public');
			// 	}
			// }


//            $tags_image = $tag->tags_image;
//            $data['tags_image'] = json_decode($data['tags_image'], true);
//            if (isset($data['tags_image']['output']['image']) && !empty($data['tags_image']['output']['image'])) {
//                $tags_image = '/tags_image/' . $data['tags_image']['output']['name'];
//                $val = $data['tags_image']['output']['image'];
//                $type = $data['tags_image']['output']['type'];
//
//                if (!empty($val)) {
//                    $logo      = Image::make($val)->encode($type);
//                    Storage::disk('public')->put($tags_image, $logo);
//                }
//            }

            $image = "";
            if (!empty($data['image'])) {
                $val = $data['image'];
                if (!empty($val)) {
                    $image = $val->store('/tags_image', 'public');
                }
            }else{
                $image = $tag->image;
            }


            //dd($tag->image);
            $tag->update([
                'value' => $data['value'],
                //'category_id' => $data['category_id'] ?? null,
                'image' => $image,
                'description' => $data['description'],
            ]);

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the record.'));
        }

        DB::commit();
        return $tag;
    }

    /**
     * @param  Tags  $Tags
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Tags  $Tags): bool
    {
		if ($this->deleteById($Tags->id)) {
			return true;
		}
		throw new GeneralException(__('There was a problem deleting the company.'));
    }

	/**
	 * @param  Tags  $Tags
	 * @return bool
	 *
	 * @throws GeneralException
	 */
	public function destroy2(Tags  $Tags): bool
	{
		if ($Tags->forceDelete()) {
			return true;
		}

		throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
	}
}
