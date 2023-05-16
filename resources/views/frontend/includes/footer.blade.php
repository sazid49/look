<footer class="text-dark border-top">
    <div class="container-fluid container-xl">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10">
                <ul class="list-unstyled d-flex justify-content-center nav">
                    @foreach (footerMenu() as $page)
                    <li class="nav-item">
                        <a href="{{ route('frontend.cms.pages',$page->slug) }}" class="nav-link gr-medium">
                            {{ $page->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
