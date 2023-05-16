<?php
    // if current page is greater than total pages...
    if ($currentpage > $page_count) {
        // set current page to last page
        $currentpage = $page_count;
    }

    // if current page is less than first page...
    if ($currentpage < 1) {
        // set current page to first page
        $currentpage = 1;
    }

    // the offset of the list, based on current page
    $offset = ($currentpage - 1) * $rows_per_page;

    // get previous page num
    $previous_page = $currentpage - 1;

    // get next page num
    $next_page = $currentpage + 1;

    $show_previous_page_arrow = ( $currentpage > 1 );
    $show_next_page_arrow = ( $currentpage < $page_count );

    $link_base = str_replace ('?'.$_SERVER['QUERY_STRING'],'', $_SERVER[ 'REQUEST_URI' ] ) . "?review_page=";
    $link_base = route('frontend.company.reviews',[$company,$company->slug]) . "?review_page=";
    $back_link =  $link_base . $previous_page;
    $next_link =  $link_base . $next_page;

    if( $currentpage > 2 )
        $range_start = $currentpage - (int)  floor( $range /2 );
    else
        $range_start = 1;

    if( $page_count - ( $currentpage + (int) ceil( $range/2 )) > 0 )
        $range_end = ( $currentpage + (int) ceil( $range/2 ));
    else
        $range_end = $page_count;
?>

    <nav aria-label="...">
        <ul class="pagination justify-content-center mt-3">

            @if ( $show_previous_page_arrow )
                <li class="page-item">
                    <a class="page-link" href="{{$back_link}}">
                        <i class="fa fa-arrow-left"></i> 
					</a>
                </li>
            @endif

            @for($i=$range_start; $i<=$range_end; $i++)
                <li class="page-item <?php echo ( $currentpage == $i ) ? 'active' : null; ?>"
                    <?php echo ( $currentpage == $i ) ? ' aria-current="page"' : null; ?>>
                    <a class="page-link" href="<?php echo $link_base . $i ?>">
                        <?php echo $i;?>
                        <?php if( $currentpage == $i ):?> <span class="sr-only">(current)</span> <?php endif;?>
                    </a>
                </li>
            @endfor

            @if( $show_next_page_arrow )
                <li class="page-item">
                    <a class="page-link" href="{{$next_link}}">
                        <i class="fa fa-arrow-right"></i>
					</a>
                </li>
            @endif
        </ul>
    </nav>