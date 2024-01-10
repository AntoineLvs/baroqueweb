<?php

namespace App\Livewire\Document;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocument extends Component
{
    use WithFileUploads;

    public $file;

    public $files = [];

    public $data;

    public $document_type = 1;

    public $document_types;

    public function mount($document_types)
    {
        $this->document_types = $document_types;

    }

    public function render()
    {
        return view('livewire.document.create-document', [
            'document_types' => $this->document_types,
        ]);
    }

    public function reset_file()
    {
        $this->file = '';
    }

    public function submit()
    {
        $this->validate([
            'data' => 'required|string',
            'document_type' => 'required',
            'file' => 'file|mimes:pdf|max:4096',
        ]);

        // PRÜFEN OB NÖTIG!
        $filename = $this->file->store('documents', 's3-public');

        // foreach ($this->files as $file) {
        //     $filename = $file->store('documents', 's3-public');
        //   }

        $user = Auth::user();

        // filename - docname_1773271717732.pdf
        $filename = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME)
        .'_'.now()->timestamp.'.'.$this->file->getClientOriginalExtension();

        // store private s3
        //$this->file->storeAs('/documents/' . $user->id . '/', $filename, 's3');
        $this->file->storeAs('/documents/'.Auth::user()->tenant->id.'/', $filename, 's3');

        // create document in db
        $user->documents()->create([
            'document_type_id' => $this->document_type,
            'data' => $this->data,
            'filename' => $filename,
            'extension' => $this->file->getClientOriginalExtension(),
            'size' => $this->file->getSize(),
        ]);

        return redirect()
            ->route('documents.index')
            ->with('message', 'Document was created successfully.');

    }
}
