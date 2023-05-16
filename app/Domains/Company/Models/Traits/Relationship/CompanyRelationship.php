<?php

namespace App\Domains\Company\Models\Traits\Relationship;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\CompanyTabs;
use App\Domains\Company\Models\CompanyTags;
use App\Domains\Company\Models\CompanyText;
use App\Domains\Company\Models\Gallery;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Models\News;
use App\Domains\Company\Models\Payment;
use App\Domains\Company\Models\Pricing;
use App\Domains\Company\Models\Recommendation;
use App\Domains\Company\Models\Reviews;
use App\Domains\Company\Models\Seo;
use App\Domains\Company\Models\Socialmedia;
use App\Domains\Company\Models\Team;
use App\Models\Category;
use App\Models\ReviewRating;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Trait CompanyRelationship.
 */
trait CompanyRelationship
{
    public function socialmedia()
    {
        return $this->hasMany(Socialmedia::class,'company_id');
    }

    public function socials()
    {
        return $this->hasMany(Socialmedia::class,'company_id');
    }

    /**
     * A company has one tab
     *
     * @return HasOne
     */
    public function companytabs(): HasOne
    {
        return $this->hasOne(CompanyTabs::class);
    }

    /**
     * A company has many recommendation
     *
     * @return HasMany
     */
    public function recommendation(): HasMany
    {
        return $this->hasMany(Recommendation::class,'company_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class,'company_id')->orderBy('id','ASC');
    }

    public function news()
    {
        return $this->hasMany(News::class,'company_id')->orderBy('id','ASC');
    }

    public function job()
    {
        return $this->hasMany(JobApplication::class,'company_id')->orderBy('id','ASC');
    }

    /**
     * Display eligible jobs
     *
     * @return HasMany
     */
    public function job_published()
    {
        return $this->hasMany(JobApplication::class,'company_id')
            ->where('active',1)
            //->where('start_date','<',now())
            ->where('expire_date','>',now())
            ->orderBy('id','ASC');
    }

    /**
     * A company has many price list category
     *
     * @return HasMany
     */
    public function pricingCategory(): HasMany
    {
        return $this->hasMany(Pricing::class)
            ->where('parent_id',null)
            ->orderBy('id','ASC');
    }

    /**
     * A company has many price list
     *
     * @return HasMany
     */
    public function pricing(): HasMany
    {
        return $this->hasMany(Pricing::class)
            //->where('parent_id',null)
            ->orderBy('id','ASC');
    }

    /**
     * A company has many galleries
     *
     * @return HasMany
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class,'company_id')->orderBy('id','ASC');
    }

    public function gallery_show()
    {
        return $this->hasOne(Gallery::class,'company_id')->where('show_on_frontside',1);
    }

    public function seo()
    {
        return $this->hasOne(Seo::class,'company_id')->orderBy('id','ASC');
    }

    /**
     * A company is belongs to a category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,null,'category_id')->where('language',app()->getLocale());
    }

    public function CompanyReview()
    {
        return $this->hasMany(Reviews::class,'company_id');
    }

    public function ReviewRating()
    {
        return $this->hasMany(ReviewRating::class,'listing_id');
    }

    public function rating()
    {
        $count = $this->ReviewRating->count();
        $sum = $this->ReviewRating->sum('rating');

        return $count > 0 ? round($sum / $count) : 0;
    }

    /**
     * A company has many tags
     *
     * @return HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(CompanyTags::class,'company_id');
    }

    public function claimed_user()
    {
        return $this->belongsTo(User::class,'claimed_by');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * A company has one text
     * @return HasOne
     */
    public function text(): HasOne
    {
        return $this->hasOne(CompanyText::class);
    }

}
