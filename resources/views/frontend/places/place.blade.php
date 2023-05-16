<div class="card-deck">
    @foreach($listings->chunk(3) as $chunks)
    @foreach($chunks as $list)
    <div class="col-md-6 col-lg-4">
        <div class="card">
			<a href="{{route('frontend.places.information',[$list,'slug'=>$list->slug])}}">
            @if (!empty($list->image_logo))
                @if (Storage::disk('public')->exists($list->image_logo))
                    <img class="card-img-top" alt="no data" src="{{asset('storage/' . $list->image_logo)}}">
                @else
                <img src="{{ asset('frontend/image/vga.png') }}" alt="..." class="card-img-top">
                @endif
            @else
            <img src="{{ asset('frontend/image/vga.png') }}" alt="..." class="card-img-top">
            @endif
            <div class="row">
                <div class="card-body">
                    <h3 class="card-title">{{ $list->place_name }}</h3>
                    <p class="card-text">{{ $list->address }}</p>
                   Akabr
                </div>
            </div>
			</a>
        </div>
    </div>
    @endforeach
    <div class="w-100">&nbsp;</div>
    @endforeach
</div> 

<div class="justify-content-center d-flex">
    {{ $listings->links("pagination::bootstrap-4") }}
</div>

@push('script')

<script>
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var page = url.split('page=')[1];
        window.history.pushState("", "", url);
        faceted(page);
    })
</script>

@endpush