@if (Storage::disk('public')->exists($user->avatar_location))
    <img class="rounded-circle1 mb-2" style="max-height: 100px"
        src="{{ url('storage/' . $user->avatar_location) }}" />
@endif
