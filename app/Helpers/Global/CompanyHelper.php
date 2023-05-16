<?php

use App\Domains\Company\Models\Company;
use App\Models\CMS;
use App\Models\ReviewRating;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

if(!function_exists('isActive')){
    function isActive($path, $active = 'active'){
        return call_user_func_array('Request::routeIs', (array)$path) ? $active : '';
    }
}

if (!function_exists('isOpen')) {
    /**
     * Display the company's opening status
     *
     * @param $id
     * @return bool
     */
    function isOpen($id): bool
    {
        $company = Company::query()->findOrFail($id);

        $day = strtolower(now()->format('l'));

        $time = $company->opening_hours->$day ?? null;

        $now = now()->format('H:i:s');

        if($time){
            if(($now < ($time->morning_to??'') && $now > ($time->morning_from??'')) || ($now < ($time->afternoon_to??'') && $now > ($time->afternoon_from??'')))
            {
                return true;
            }
        }

        return false;
    }
}

if(!function_exists('rating')){
    /**
     * Average company rating
     *
     * @param $id
     * @return float|int
     */
    function rating($id): float|int
    {
        $company = Company::query()->findOrFail($id);

        $count = $company->ReviewRating->count();
        $sum = $company->ReviewRating->sum('rating');

        return $count > 0 ? round($sum / $count) : 0;
    }
}
if(!function_exists('criteriaPercent')){
    function criteriaPercent($criteriaId,$listingId,$listingType)
    {
        $reviewRating = ReviewRating::query()
            ->where('review_criteria_id',$criteriaId)
            ->where('listing_id',$listingId)
            ->where('listing_type',$listingType);

        $count = $reviewRating->count();
        $rating = $reviewRating->sum('rating');

        if($count > 0 && $rating > 0) {
            return 100 / (($count/$rating) * 5).'%';
        }

    }
}

if(!function_exists('enableTab')){
    /**
     * @param $company
     * @param $tab
     * @param string $disabled
     * @return string
     */

    // || $company->payment->payer == 1 is not working because not every company has a payment entry
    function enableTab($company, $tab, string $disabled='disabled'): string
    {
        if($company->show_tabs == 1 || ($company->payment->payer ?? 0 == 1)){
            if($company->active == 1 && $company->published == 1 && $company->companytabs->$tab == 1){
                $disabled = '';
            }
        }else{
            $disabled = 'disabled';
        }

        return $disabled;

    }
}

if(!function_exists('footerMenu')){
    /**
     * Get all footer items
     *
     * @return Collection
     */
    function footerMenu(): Collection
    {
        return CMS::query()
            ->where('show_on_footer',1)
            ->where('active',1)
            ->get();
    }
}


if(!function_exists('showLabelLanguage')) {

        $show_label ?? '';

    function showLabelLanguage($item): string
    {
        if(session('locale') == 'de')
        {
            $show_label = $item->label_de;
        }

        elseif(session('locale') == 'fr')
        {
            $show_label = $item->label_fr;
        }

        elseif(session('locale') == 'it')
        {
            $show_label = $item->label_it;
        }

        else
        {
            $show_label = $item->label_en;
        }

        return $show_label;
    }

}

