<div>
  @if( $product->product_type->id == 1 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/vegetable.png') }}" alt="">

  @elseif( $product->product_type->id == 2 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/fruits.png') }}" alt="">

  @elseif( $product->product_type->id == 3 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/salad.png') }}" alt="">

  @elseif( $product->product_type->id == 4 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/herbs.png') }}" alt="">

  @elseif( $product->product_type->id == 5 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/milk.png') }}" alt="">

  @else
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-blue" src="{{ asset('assets/img/beef.png') }}" alt="">

  @endif

</div>
