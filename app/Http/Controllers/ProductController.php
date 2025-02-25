<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::paginate(10);
        // dd($product);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Generate UUID untuk ID produk
        $idProduct = Str::uuid();

        // Validasi input
        $request->validate([
            'name_product' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:png,jpg|max:2048',
        ], [
            'name_product.required' => 'Nama produk harus diisi.',
            'category.required' => 'Kategori produk harus diisi.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'thumbnail.required' => 'Thumbnail produk harus diunggah.',
            'thumbnail.image' => 'File thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail hanya boleh berupa file dengan format PNG atau JPG.',
            'thumbnail.max' => 'Ukuran thumbnail tidak boleh lebih dari 2MB.',
        ]);

        // Proses Upload Thumbnail
        $img = $request->file('thumbnail');
        $filename = time() . '_' . Str::uuid() . '.' . $img->getClientOriginalExtension();

        // Simpan ke `storage/app/public/uploads/`
        $path = $img->storeAs('uploads', $filename, 'public');

        // Simpan path ke database
        $thumbnailPath = 'storage/uploads/' . $filename;


        // Simpan data produk ke database
        $product = Product::create([
            'id_product' => $idProduct,
            'name_product' => $request->name_product,
            'category' => $request->category,
            'price' => $request->price,
            'Thumbnail' => 'storage/uploads/' . $thumbnailPath, // Simpan path yang benar
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Product')->with('success', 'Produk berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
