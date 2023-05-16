@extends('backend.layouts.app')

@section('title', __('View User'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                {{-- <tr>
                    <th>@lang('Type')</th>
                    <td>@include('backend.auth.user.includes.type')</td>
                </tr> --}}

                <tr>
                    <th>@lang('Avatar')</th>
                    <td><img src="{{ $user->avatar }}" class="user-profile-image" /></td>
                </tr>

                <tr>
                    <th>@lang('ID Image')</th>
                    <td>
                        @if (Storage::disk('public')->exists($user->id_image))
                            <img class="rounded-circle1 mb-2" style="max-height: 100px"
                                src="{{ url('storage/' . $user->id_image) }}" /><br>
                            <a target="_blank" class="btn btn-sm btn-primary"
                                href="{{ url('storage/' . $user->id_image) }}">{{ __('labels.general.preview') }}</a>
                            @if ($user->id_image_approve == 0)
                                <a data-method="cancel" data-trans-button-cancel="Cancel" data-trans-button-confirm="Yes"
                                    data-trans-title="Warning" data-trans-text="{{ __('alerts.id_approve') }}"
                                    href="{{ route('admin.auth.user.id_approve', $user) }}"
                                    class="btn btn-warning btn-sm btn-icon ml-auto1 waves-effect waves-light"
                                    data-toggle="tooltip" data-placement="top" title="Approve ID">
                                    {{ __('labels.general.approve_id') }}
                                </a>
                            @endif
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('E-mail Address')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('City')</th>
                    <td>{{ $user->userdetails->city ?? '' }}</td>
                </tr>

                <tr>
                    <th>@lang('Postcode')</th>
                    <td>{{ $user->userdetails->postcode ?? '' }}</td>
                </tr>

                <tr>
                    <th>@lang('Phone')</th>
                    <td>{{ $user->userdetails->phone ?? '' }}</td>
                </tr>

                <tr>
                    <th>@lang('Address')</th>
                    <td>{{ $user->userdetails->address ?? '' }}</td>
                </tr>

                <tr>
                    <th>@lang('Birthday')</th>
                    <td>{{ $user->userdetails->birthday ?? '' }}</td>
                </tr>

                <tr>
                    <th>@lang('Status')</th>
                    <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                </tr>



                {{-- <tr>
                    <th>@lang('Verified')</th>
                    <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('2FA')</th>
                    <td>@include('backend.auth.user.includes.2fa', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('Timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('Last Login At')</th>
                    <td>
                        @if ($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('Last Known IP Address')</th>
                    <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                </tr>

                @if ($user->isSocial())
                    <tr>
                        <th>@lang('Provider')</th>
                        <td>{{ $user->provider ?? __('N/A') }}</td>
                    </tr>

                    <tr>
                        <th>@lang('Provider ID')</th>
                        <td>{{ $user->provider_id ?? __('N/A') }}</td>
                    </tr>
                @endif

                <tr>
                    <th>@lang('Roles')</th>
                    <td>{!! $user->roles_label !!}</td>
                </tr>

                <tr>
                    <th>@lang('Additional Permissions')</th>
                    <td>{!! $user->permissions_label !!}</td>
                </tr> --}}
            </table>
        </x-slot>

        {{-- <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Account Created'):</strong> @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }})

                @if ($user->trashed())
                    <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot> --}}
    </x-backend.card>
@endsection
