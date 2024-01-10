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
  min-width: 30%;
  height: auto;

  left: 0;
  overflow: hidden;
  border-right: 1px solid rgba(0, 0, 0, 0.25);
}

.map {
  position: inherit;
  left: 30%;
  max-width: 70%;
  height: 100%;


}

</style>

<div>
  <!-- START DIV 1 -->

  <div class="bg-white">
    <div>

      <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8 pb-8">
          <!-- Content goes here -->

          <!-- Be sure to use this with a layout container that is full-width on mobile -->
          <div class="bg-white overflow-hidden shadow sm:rounded-lg">

            <div class="px-4 py-5 sm:p-6 relative">

              <!-- Content goes here -->

              <div class='sidebar'>
                <div class='heading'>
                  <h1>Locations</h1>
                </div>

                <div id='listings' class='listings'></div>

              </div>

              <div id='map' class='map'></div>
              <livewire:hub.map-finder/>
            </div>
          </div>


        </div>



      </main>
    </div>
  </div>
  <!-- END DIV 1 -->
</div>

@endsection
