<div>
  @if( $location->location_type->id == 1 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ asset('assets/img/hofladen.png') }}" alt="">

  @elseif( $location->location_type->id == 2 )
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ asset('assets/img/garden.png') }}" alt="">

  @else
  <img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green" src="{{ asset('assets/img/market.png') }}" alt="">

  @endif

</div>
