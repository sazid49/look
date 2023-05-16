@extends('backend.layouts.app')

@section('title', __('labels.tags.detail'))

@section('page-title', __('labels.tags.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.tags.detail'))</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.tags.index')" :text="'Back'" />
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mt-3">
            <x-backend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>{{ __('labels.tags.name') }}</th>
                                    <td>{{ $tag->value }}</td>
                                </tr>

                                {{-- <tr>
                                    <th>{{ __('labels.tags.category') }}</th>
                                    <td>{{ $tag->category->value }}</td>
                                </tr> --}}

                                <tr>
                                    <th>{{ __('labels.tags.image') }}</th>
                                    <td>
										<div class="form-group mb-3 col-md-12">
											@if (!empty($tag->image))
												@if (Storage::disk('public')->exists($tag->image))
													<img alt="no data" src="{{ url('storage/' . $tag->image) }}" height="60px">
												@endif
											@endif
										</div>
									</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.tags.description') }}</th>
                                    <td>{{ $tag->description }}</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
