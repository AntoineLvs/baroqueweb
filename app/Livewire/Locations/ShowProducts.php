<?php

namespace App\Livewire\Locations;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;


use App\Scopes\TenantScope;


class ShowProducts extends Component
{
    use WithPagination;

    public $location;
    public $locations;

    public $products;
    public $services;

    public $product;
    public $location_id;
    public $document_id;


    public function mount($location_id, $location)
    {
        $this->location = $location;
        $this->location_id = $location_id;
    }

    public function getDocumentDetails($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $documents = $product->getDocuments(); // Appel de la méthode non statique sur l'instance du produit trouvé

            if ($documents && $documents->isNotEmpty()) {
                $documentNames = $documents->pluck('filename')->implode(', '); // Obtenez les noms des documents séparés par une virgule
                return $documentNames;
            } else {
                return 'No documents available';
            }
        } else {
            return 'Product not found';
        }
    }

    public function getDocuments($productId)
    {
        $product = Product::withoutGlobalScope(TenantScope::class)->findOrFail($productId);
        return $product->getDocuments();
    }






    public function render()
    {
        return view('livewire.locations.show-products', [
            'location' => $this->location,

        ]);
    }
}
