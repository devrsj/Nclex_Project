
@section('shop')

<div class="pagination poduct_pagination">
                            <ul>
                           @if(isset($products)) {{ $products->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($product_categories)) {{ $product_categories->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($product_tags)) {{ $product_tags->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($search_products)){{ $search_products->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($product_subcategories)) {{ $product_subcategories->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($oldests)) {{ $oldests->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($newests)) {{ $newests->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($lows)) {{ $lows->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($highs)){{ $highs->appends(['search' => request()->query('search')]) ->links() }} @endif
                           @if(isset($alls)) {{ $alls->appends(['search' => request()->query('search')]) ->links() }} @endif
                           
                        
                        
                        </ul>
                        </div>
                        <!--shop gallery end-->
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- product page section end -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: {{ $max }},
      values: [ {{ $min }},{{ $max }} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Rs" + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );
        $( "#minValue" ).val(ui.values[ 0 ]);
        $( "#maxValue" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs" + $( "#slider-range" ).slider( "values", 1 ) );
    
    
    });
  </script>
<link rel="stylesheet"
    href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection