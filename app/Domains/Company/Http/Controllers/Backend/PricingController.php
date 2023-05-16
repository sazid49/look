<?php

namespace App\Domains\Company\Http\Controllers\Backend;

use App\Domains\Company\Models\Pricing;
use App\Domains\Company\Services\CompanyService;
use App\Http\Controllers\Controller;
use App\Slim\Slim;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * @var CompanyService
     */
    protected $CompanyService;

    /**
     * CategoryController constructor.
     *
     * @param  CompanyService  $CompanyService
     */
    public function __construct(CompanyService $CompanyService)
    {
        $this->CompanyService = $CompanyService;
    }

    public function thumbnail(Request $request,$id)
    {
        $images = Slim::getImages();

        // Should always be one image (when posting async), so we'll use the first on in the array (if available)
        $image = array_shift($images);

        $pricing = Pricing::query()->findOrFail($id);

        // get the name of the file
        $nameSlug = \Str::slug($pricing->company->company_name);
        $companyNameExists = strpos($image['output']['name'],$nameSlug);


        if($companyNameExists){
            $name = $image['output']['name'];
        }else{
            $ext = pathinfo($image['output']['name'], PATHINFO_EXTENSION);
            $name = $nameSlug . '_lookon_' . rand(11111, 99999) . '.' . $ext;
        }

        // get the crop data for the output image
        $data = $image['output']['data'];

        // If you want to store the file in another directory pass the directory name as the third parameter.
        $output = Slim::saveFile($data, $name, '../storage/app/public/pricing_item/'.$pricing->company_id.'/',false);

        $pathNFile = 'pricing_item/'.$pricing->company_id.'/'.$name;

        $pricing->update(['image'=>$pathNFile]);

        return $output;
    }


}
