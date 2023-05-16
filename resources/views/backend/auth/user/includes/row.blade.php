{{-- <x-livewire-tables::bs4.table.cell>
    @include('backend.auth.user.includes.type', ['user' => $row])
</x-livewire-tables::bs4.table.cell> --}}

<x-livewire-tables::bs4.table.cell style="text-align: center">
    @include('backend.auth.user.includes.profile_photo', ['user' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell style="text-align: center">
    @include('backend.auth.user.includes.photo_id', ['user' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->userdetails->city ?? "" }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->userdetails->address ?? "" }}
</x-livewire-tables::bs4.table.cell>

{{-- <x-livewire-tables::bs4.table.cell>
    @include('backend.auth.user.includes.verified', ['user' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.auth.user.includes.2fa', ['user' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->roles_label !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->permissions_label !!}
</x-livewire-tables::bs4.table.cell> --}}

<x-livewire-tables::bs4.table.cell>
    @include('backend.auth.user.includes.actions', ['user' => $row])
</x-livewire-tables::bs4.table.cell>
