@extends('layouts.app-home')
@section('content')


<style>
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
  font-weight: 700;
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

/* The page is split between map and sidebar - the sidebar gets 1/3, map
gets 2/3 of the page. You can adjust this to your personal liking. */
.sidebar {
  position: inherit;

}



</style>

<div>
  <!-- START DIV 1 -->

  <!-- component -->
  <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

  <!-- page -->
  <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <!-- header page -->
    <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
      <!-- logo -->
      <div class="flex items-center space-x-2">
        <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
        <div>Filter</div>
      </div>


    </header>

    <div class="flex sidebar">
      <!-- aside -->
      <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2" style="height: 100vh"
      x-show="asideOpen">
      <a href="#" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
        <span class="text-2xl"><i class="bx bx-home"></i></span>
        <span>Dashboard</span>
      </a>


    </aside>

    <!-- main content page -->
    <div id='map' class="w-full">





    </div>

    <!-- main content endsection -->


  </div>
</main>

<script>
document.addEventListener("alpine:init", () => {
  Alpine.data("layout", () => ({
    profileOpen: false,
    asideOpen: true,
  }));
});
</script>

<livewire:hub.map-finder/>

</div>
<!-- END DIV 1 -->


@endsection
