@extends('frontend.layouts.legacy.app')

@section('title', __('labels.category.tab_title'))

@section('style')
@stop
@section('content')
    <!-- wrapper -->
    <div id="wrapper">

        <!-- wrapper -->
        <div class="container">
            <br><br>
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        @lang('labels.category.recently_registered_companies')
                        <span>@lang('labels.category.worldclass_local_businesses')</span>
                    </h3>
                </div>
            </div>
            <div class="row">
                @if (is_array($results))
                    @foreach ($results as $company)
                        @if (is_array($company))
                            <div class="col-md-3 col-12">
                                <a href="{{route('frontend.company.information',[$company['id'],$company['slug']])}}"
                                   class="listing-item-container compact">
                                    <div class="listing-item" style="height: 166px !important;">
                                        @if (Storage::disk('public')->exists($company['company_logo']))
                                            <img class="personal_logo" alt="no data"
                                                 src="{{ url('storage/' . $company['company_logo']) }}"
                                                 class='rounded-circle' height="100px">
                                        @else
                                            <img src="https://via.placeholder.com/110/cbe2f3/00c8fa"
                                                 class="rounded-circle1">
                                        @endif

                                        <?php if ( $company[ 'is_open' ] ) : ?>
                                        <div class="listing-badge now-open"><?php echo trans ( 'now_open' ); ?></div>
                                        <?php else : ?>
                                        <div class="listing-badge now-closed"><?php echo trans ( 'closed' ); ?></div>
                                        <?php endif; ?>

                                        <div class="listing-item-content">
                                            <?php if ( !empty( $company[ 'rating' ] ) ) : ?>
                                            <div class="numerical-rating"
                                                 data-rating="<?php echo $company['rating']; ?>"></div>
                                            <?php endif; ?>
                                            <h3><?php echo $company[ 'company_name' ]; ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
            </div>

            <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                            <?php //echo $results['companies']['page_links'];
                            ?>
                    </ul>
                </nav>
            </div>
            @else
                <p>Keine Ergebnisse für Companies.</p>
            @endif
        </div>

    </div>
@stop
