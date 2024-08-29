<?php

namespace App\Livewire\Product;

use Illuminate\Support\Facades\Auth;
use App\Models\BaseProduct;
use App\Models\Document;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Standard;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{



    public $product;

    public $name;
    public $data;


    public $product_type_id;
    public $product_types;
    public $value;
    public $document_id;

    public $base_products;
    public $base_product_id;

    public $standards;
    public $standard_id;

    public $model;
    public $options;
    public $showContent;


    public $product_unit_id = 1;
    public $product_units;

    public $selectedProductType;

    public $document_type = 1;

    public $blend_percent = 0;
    public $blendPercentVisible = false;


    public function mount($product_types, $product_units, $base_products, $standards)
    {
      $this->product_types = $product_types;

      $this->product_units = $product_units;
      $this->base_products = $base_products;
      $this->standards = $standards;
    }

    public function updatedSelectedBaseProduct()
    {
      if ($this->product_type_id == '1') {
        if ($this->base_product_id == '1') {
          // Show input to fill blend_percent for Indivudual Blend percent
          $this->blendPercentVisible = true;
        } else {
          // Don't show the input, and add the original blend_percent value to blend_percent
          $baseProduct = BaseProduct::find($this->base_product_id);
          if ($baseProduct) {
            $this->blend_percent = $baseProduct->blend_percent;
          } else {
            $this->blend_percent = 0;
          }
          $this->blendPercentVisible = false;
        }
      } else {
        // Don't show input if Product type isn't HVO -> no blend_percent
        $this->blend_percent = 0;
        $this->blendPercentVisible = false;
      }
    }

    public function updatedBaseProductId()
    {
      if ($this->product_type_id == '1' && $this->base_product_id != '1') {
        // User selected a base_product other than 'HVO Individual Blend'
        $baseProduct = BaseProduct::find($this->base_product_id);
        // Original blend percent of the base product retrieved, and used for the new product blend percent
        if ($baseProduct) {
          $this->blend_percent = $baseProduct->blend_percent;
        }
      }
    }

    public function submit()
    {
      $data = $this->validate([
        'name' => 'required|string|max:100',
        'data' => 'string|max:500',
        'product_type_id' => 'required',
        'product_unit_id' => 'required',
        'base_product_id' => 'required',
        'standard_id' => 'required',
        'blend_percent' => 'nullable',

      ]);

      // Créez le produit
      $product = Product::create($data);

      // Sauvegardez le produit pour obtenir son ID généré automatiquement
      $product->save();

      // Sauvegardez le document si présent
      if ($this->document_id) {
        $path = $this->document_id->storeAs('/documents/' . $product->id . '/', 'document_' . now()->timestamp . '.' . $this->document_id->getClientOriginalExtension(), 'public');

        // Créez un nouveau document associé au produit
        $document = $this->createDocument($this->document_id, $product->user_id);

        // Associez l'ID du document au produit
        $product->document_id = $document->id;

        // Sauvegardez à nouveau le produit avec l'ID du document mis à jour
        $product->save();
      }

      $message = '' . $product->name . ' was created successfully.';

      return redirect()
        ->route('products.index')
        ->with('message', $message);
    }

    public function createDocument($file, $userId)
    {

      $user = Auth::user();

      $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
        . '_' . now()->timestamp . '.' . $file->getClientOriginalExtension();

      // store private s3
      $file->storeAs('/documents/' . $user->tenant_id . '/', $filename, 's3');

      // create document in db
      $document = Document::create([
        'document_type_id' => $this->document_type,
        'user_id' => $user->id, // Utilisez l'ID de l'utilisateur fourni
        'data' => $this->data, // Assurez-vous que $this->informations est défini dans votre composant
        'filename' => $filename,
        'extension' => $file->getClientOriginalExtension(),
        'size' => $file->getSize(),
      ]);

      return $document;
    }

    public function render()
    {
      $this->product_types = ProductType::all();
      if ($this->product_type_id) {
        $this->base_products = BaseProduct::where('product_type_id', $this->product_type_id)->get();
        $this->standards = Standard::where('product_type_id', $this->product_type_id)->get();
      } else {
        $this->base_products = [];
        $this->standards = [];
      }

      return view('livewire.product.create-product', [
        'product_types' => $this->product_types,
        'product_units' => $this->product_units,
        'base_products' => $this->base_products,
        'standards' => $this->standards,
      ]);
    }
}
