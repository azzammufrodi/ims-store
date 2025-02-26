<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

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
        DB::beginTransaction();
        try {
            // Generate UUID untuk ID produk
            $idProduct = Str::uuid();

            // Validasi input
            $request->validate([
                'name_product' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'price' => 'required|numeric',
                'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
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


            $path = $img->storeAs('uploads', $filename, 'public');

            // Simpan data produk ke database
            $product = Product::create([
                'id_product' => $idProduct,
                'name_product' => $request->name_product,
                'category' => $request->category,
                'price' => $request->price,
                'thumbnail' => 'storage/uploads/' . $filename, // Simpan path yang benar
            ]);

            DB::commit();

            // Redirect dengan pesan sukses
            Alert::success('Sukses', 'Data Berhasil Disimpan');
            return redirect()->route('Product');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::warning('Gagal', 'Periksa Kembali Data Anda : ' . $e->getMessage());
            return back();
        }
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
    public function edit($id_product)
    {
        $product = Product::where("id_product", $id_product)->first();
        return view('admin.product.edit', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_product)
    {
        DB::beginTransaction();
        try {
            // Cari produk berdasarkan ID
            $product = Product::where("id_product", $id_product)->first();

            // Validasi input
            $request->validate([
                'name_product' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'price' => 'required|numeric',
                'thumbnail' => 'nullable|image|mimes:png,jpg|max:2048',
            ], [
                'name_product.required' => 'Nama produk harus diisi.',
                'category.required' => 'Kategori produk harus diisi.',
                'price.required' => 'Harga produk harus diisi.',
                'price.numeric' => 'Harga produk harus berupa angka.',
                'thumbnail.image' => 'File thumbnail harus berupa gambar.',
                'thumbnail.mimes' => 'Thumbnail hanya boleh berupa file dengan format PNG atau JPG.',
                'thumbnail.max' => 'Ukuran thumbnail tidak boleh lebih dari 2MB.',
            ]);

            // Jika ada thumbnail baru, hapus thumbnail lama dan unggah yang baru
            if ($request->hasFile('thumbnail')) {
                // Hapus file lama jika ada
                if ($product->thumbnail && Storage::exists(str_replace('storage/', 'public/', $product->thumbnail))) {
                    Storage::delete(str_replace('storage/', 'public/', $product->thumbnail));
                }

                // Proses Upload Thumbnail Baru
                $img = $request->file('thumbnail');
                $filename = time() . '_' . Str::uuid() . '.' . $img->getClientOriginalExtension();

                // Simpan ke `storage/app/public/uploads/`
                $path = $img->storeAs('uploads', $filename, 'public');
                $product->thumbnail = 'storage/uploads/' . $filename;
            }

            // Update data produk
            $product->update([
                'name_product' => $request->name_product,
                'category' => $request->category,
                'price' => $request->price,
            ]);

            DB::commit();

            Alert::success('Sukses', 'Data Berhasil Diupdate');
            return redirect()->route('Product');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::warning('Gagal', 'Periksa Kembali Data Anda : ' . $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_product)
    {
        DB::beginTransaction();
        try {
            // Cari produk berdasarkan ID
            $product = Product::where("id_product", $id_product)->first();

            // Hapus file thumbnail jika ada
            if ($product->thumbnail && file_exists(public_path($product->thumbnail))) {
                unlink(public_path($product->thumbnail));
            }

            // Hapus produk dari database
            $product->delete();

            DB::commit();

            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Product');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::warning('Gagal', 'Periksa Kembali  : ' . $e->getMessage());
            return back();
        }
    }
}
