<section class="category-panel-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="category-panel position-relative">
                    <ul class="popular-searchs flex-nowrap d-flex align-items-center justify-content-lg-center list-unstyled text-center">
                        @foreach($company_category_list as $category)
                            <li>
                                <a href="{{ route('frontend.companies.search',['categories[]'=>$category->category_id]) }}" class="shadow">
                                <span class="box d-flex flex-column align-items-center">
                                <i class="{{ $category->icon }}" style="font-size: 1.3em;color: #00c3ff"></i>
                                  <span class="mt-1">{{ $category->value }}</span>
                                </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
