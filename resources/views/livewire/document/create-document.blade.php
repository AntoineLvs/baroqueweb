<div>
  <form wire:submit.prevent="submit">
    @csrf

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200">
        <label for="data" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Data
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input wire:model="data" id="data" name="data" type="text" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>

        @error('data')
        <div class="text-sm text-red-500 mt-2">{{ $message }}
        </div>
        @enderror

      </div>
    </div>


    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="type" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
          Document Type
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select wire:model="document_type" name="document_type_id" id="document_type_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" required>
              @foreach ($document_types as $document_type)
              @if($document_type['id'] == old('document'))
              <option wire:key="{{ $document_type['id']}}" value="{{$document_type->id }}" selected>{{$document_type['name']}}</option>
              @else
              <option wire:key="{{ $document_type['id']}}" value="{{$document_type->id }}">{{$document_type['name']}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>

        @error('document_type')
        <div class="text-sm text-red-500 mt-2">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>



    <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
      <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        Data Sheet

        @error('file')
        <div class="text-sm text-red-400 mt-2">
          {{ $message }}
        </div>
        @enderror

      </label>



      <div class="mt-1 sm:mt-0 sm:col-span-2">

        <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
          <div x-ref="dnd"
          class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
          <input
          wire:model="file"
          accept="*" type="file"
          class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
          @change="addFiles($event)"
          @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
          @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
          @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
          title="" />

          <div class="flex flex-col items-center justify-center py-10 text-center">
            <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="m-0">Drag your files here or click in this area.</p>
        </div>
      </div>

      <template x-if="files.length > 0">
        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
        @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
        <template x-for="(_, index) in Array.from({ length: files.length })">
          <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
          style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
          :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">

          <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" x-on:click="remove(index)">
            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>

        <template x-if="files[index].type.includes('audio/')">
          <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
        </svg>
      </template>
      <template x-if="files[index].type.includes('application/') || files[index].type === ''">
        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
      </svg>
    </template>
    <template x-if="files[index].type.includes('image/')">
      <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
      x-bind:src="loadFile(files[index])" />
    </template>
    <template x-if="files[index].type.includes('video/')">
      <video
      class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
      <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
      </video>
    </template>

    <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
      <span class="w-full font-bold text-gray-900 truncate"
      x-text="files[index].name">Loading</span>
      <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
    </div>

    <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)"
    @dragleave="fileDropping = null"
    :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
  </div>
</div>
</template>
</div>
</template>
</div>

</div>



</div>


<script src="https://unpkg.com/create-file-list"></script>
<script>
function dataFileDnD() {
  return {
    files: [],
    fileDragging: null,
    fileDropping: null,
    humanFileSize(size) {
      const i = Math.floor(Math.log(size) / Math.log(1024));
      return (
        (size / Math.pow(1024, i)).toFixed(2) * 1 +
        " " +
        ["B", "kB", "MB", "GB", "TB"][i]
      );
    },
    remove(index) {
      let files = [...this.files];
      files.splice(index, 1);

      this.files = createFileList(files);
    },
    drop(e) {
      let removed, add;
      let files = [...this.files];

      removed = files.splice(this.fileDragging, 1);
      files.splice(this.fileDropping, 0, ...removed);

      this.files = createFileList(files);

      this.fileDropping = null;
      this.fileDragging = null;
    },
    dragenter(e) {
      let targetElem = e.target.closest("[draggable]");

      this.fileDropping = targetElem.getAttribute("data-index");
    },
    dragstart(e) {
      this.fileDragging = e.target
      .closest("[draggable]")
      .getAttribute("data-index");
      e.dataTransfer.effectAllowed = "move";
    },
    loadFile(file) {
      const preview = document.querySelectorAll(".preview");
      const blobUrl = URL.createObjectURL(file);

      preview.forEach(elem => {
        elem.onload = () => {
          URL.revokeObjectURL(elem.src); // free memory
        };
      });

      return blobUrl;
    },
    addFiles(e) {
      const files = createFileList([...this.files], [...e.target.files]);
      this.files = files;
      this.form.formData.files = [...files];
    }
  };
}
</script>






<!-- <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
<label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
Data Sheet
</label>
<div class="mt-1 sm:mt-0 sm:col-span-2">
<div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
<div class="space-y-1 text-center">
<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
</svg>
<div class="flex text-sm text-gray-600">
<label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
<span>Upload a file</span>
<input wire:model="file" type="file" id="file" name="file" class="sr-only">
</label>
<p class="pl-1">or drag and drop</p>
</div>
<p class="text-xs text-gray-500">
Only PDF up to 10MB
</p>

</div>

</div>
@if ($file)
<p class="text-m pt-4 text-gray-900">
{{ $file->getClientOriginalName() }}
<button wire:click="reset_file">

<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>
</button>
</p>
@endif

</div>



@error('file')
<div class="text-sm text-red-500 mt-2">{{ $message }}
</div>
@enderror

</div> -->


<div class="mt-8 border-t border-gray-200 pt-5">
  <div class="pt-5">
    <div class="flex justify-end">
      <a href="{{ route('documents.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
      </button>
    </div>
  </div>
</div>

</form>
</div>
