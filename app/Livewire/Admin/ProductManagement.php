<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ProductManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $description, $price, $category, $stock, $image, $is_active = true;
    public $productId;
    public $isModalOpen = false;
    public $search = '';

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'category' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
        'is_active' => 'boolean'
    ];

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('category', 'like', '%'.$this->search.'%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.product-management', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'stock' => $this->stock,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('products', 'public');
        }

        Product::create($data);

        session()->flash('message', 'Product created successfully.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category = $product->category;
        $this->stock = $product->stock;
        $this->is_active = $product->is_active;

        $this->isModalOpen = true;
    }

    public function update()
    {
        $this->validate();

        $product = Product::find($this->productId);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'stock' => $this->stock,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('products', 'public');
        }

        $product->update($data);

        session()->flash('message', 'Product updated successfully.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product deleted successfully.');
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->stock = '';
        $this->image = null;
        $this->is_active = true;
        $this->productId = null;
    }
}