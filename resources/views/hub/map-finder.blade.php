@extends('layouts.app-home')
@section('content')


<style>

[x-cloak] { display: none !important; }

.listings {
  height: 100%;
  overflow: auto;
  padding-bottom: 60px;
}

.listings .item {
  border-bottom: 1px solid #eee;
  padding: 10px;
  text-decoration: none;
}

.listings .item:last-child { border-bottom: none; }

.listings .item .title {
  display: block;
  color: #00853e;
  font-weight: 500;

}

.listings .item .title small { font-weight: 400; }

.listings .item.active .title,
.listings .item .title:hover { color: #8cc63f; }

.listings .item.active {
  background-color: #f8f8f8;
}

::-webkit-scrollbar {
  width: 3px;
  height: 3px;
  border-left: 0;
  background: rgba(0, 0, 0, 0.1);
}

::-webkit-scrollbar-track {
  background: none;
}

::-webkit-scrollbar-thumb {
  background: #00853e;
  border-radius: 0;
}

/* Marker tweaks */
.mapboxgl-popup-close-button {
  display: none;
}

.mapboxgl-popup-content {
  font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
  padding: 0;
  width: 180px;
}

.mapboxgl-popup-content h3 {
  background: #91c949;
  color: #fff;
  margin: 0;
  padding: 10px;
  border-radius: 3px 3px 0 0;
  font-weight: 700;
  margin-top: -15px;
}

.mapboxgl-popup-content h4 {
  margin: 0;
  padding: 10px;
  font-weight: 400;
}

.mapboxgl-popup-content div {
  padding: 10px;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
  margin-top: 15px;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
  border-bottom-color: #91c949;
}


.mapboxgl-popup {
  padding-bottom: 50px;
}

.marker {
  border: none;
  cursor: pointer;
  height: 56px;
  width: 56px;
  background-image: url('assets/img/marker.png');
}





</style>

<div>
  <!-- START DIV 1 -->

  <!-- component -->

  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

  <!-- page -->

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="max-w-10xl p-4 mx-auto sm:px-6 lg:px-8">

    <main class="min-h-screen w-full bg-gray-100 text-gray-700  border-2 border-r-2 border-gray-300 mx-auto sm:px-6 lg:px-8" x-data="layout">
      <!-- header page -->
      <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-gray-100 p-2">
        <!-- logo -->
        <div class="flex items-center bg-gray-400 space-x-2">
          <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
          <div>Filter</div>
        </div>


      </header>

      <div class="flex sidebar">

        <!-- aside -->
        <aside  class="flex w-72 flex-col space-y-2 border-r-2 border-gray-300 bg-gray-100 p-2" style="height: 100vh"
        x-show="asideOpen">

        <a href="#" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
          <span class="text-2xl"><i class="bx bx-home"></i></span>
          <span>Dashboard</span>
        </a>

        <div id="listings" class="listings ml-4 text-xs">

        </div>


      </aside>

      <!-- main content page -->

      <div id="map" class="w-full flex" style='width: 100vw; height: 100vh;'>
      </div>
      <livewire:hub.map-finder/>


      <!-- main content endsection -->

    </div>
  </main>

  <!-- Content goes here -->
</div>


<script>
document.addEventListener("alpine:init", () => {
  Alpine.data("layout", () => ({

    asideOpen: true,
  }));
});
</script>



</div>
<!-- END DIV 1 -->


@endsection
