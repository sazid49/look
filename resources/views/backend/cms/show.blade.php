@extends('backend.layouts.app')

@section('title', __('labels.cms.detail'))

@section('page-title', __('labels.cms.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.cms.detail'))</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.cms.index')" :text="'Back'" /> | <a target="_black" href="{{route('frontend.cms.pages',$cms->slug)}}" class="zoomIn animated">{{__('labels.company.view_previw')}}</a>
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
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>{{ __('labels.cms.title') }}</th>
                                    <td>{{ $cms->title }}</td>
                                </tr> 
								
                                <tr>
                                    <th>{{ __('labels.cms.description') }}</th>
                                    <td>{{ $cms->description }}</td>
                                </tr>
                                
								<tr>
                                    <th>{{ __('labels.cms.content') }}</th>
                                    <td>{!! $cms->content !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('show_on_footer') }}</th>
                                    <td><input type="checkbox" name="show_on_footer" value="1" class="flat-red" {{ $cms->show_on_footer == 1 ? 'checked' : '' }}></td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
