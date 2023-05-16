<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use App\Domains\Company\Models\Company;
use App\Domains\Company\Models\Contact;
use App\Domains\Company\Models\JobApplication;
use App\Domains\Company\Models\News;
use App\Domains\Company\Models\Reviews;
use App\Domains\Places\Models\Place;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use JetBrains\PhpStorm\NoReturn;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $id = Auth()->user()->id;
        $totalCompanies = Company::count();
        $totalPlace = Place::count();
        $totalUsers = User::where('type','user')->count();
        $totalJobs = JobApplication::count();
        $totalReviews = Reviews::count();
        $totalNews = News::count();
        $totalContact = Contact::count();

        $myCompanies = Company::where('claimed_by',$id)->count();

        return view('backend.dashboard.index')->withtotalCompanies($totalCompanies)
        ->withtotalPlace($totalPlace)
        ->withtotalUsers($totalUsers)
        ->withtotalJobs($totalJobs)
        ->withtotalReviews($totalReviews)
        ->withtotalNews($totalNews)
        ->withtotalContact($totalContact);
    }
}
