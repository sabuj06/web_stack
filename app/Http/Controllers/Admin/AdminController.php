<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\AboutPage;
use App\Models\CoreValue;
use App\Models\ProductsPage;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function dashboard() {
        $contacts      = Contact::latest()->paginate(10);
        $productsCount = Product::count();
        return view('admin.dashboard', compact('contacts', 'productsCount'));
    }

    public function deleteContact($id) {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'Deleted successfully!');
    }

    public function products() {
        $products     = Product::orderBy('sort_order')->get();
        $productsPage = ProductsPage::first();
        return view('admin.products', compact('products', 'productsPage'));
    }

    public function createProduct(){
        return view('admin.create-product');
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'name'        => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'action_text' => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'name'        => $request->name,
            'sub_title'   => $request->sub_title,
            'action_text' => $request->action_text,
            'is_special'  => $request->has('is_special'),
            'sort_order'  => $request->sort_order ?? 0,
        ];

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        Product::create($data);
        return response()->json(['success' => true, 'message' => 'Product created successfully!']);
    }

    public function editProduct($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, $id) {
        $request->validate([
            'name'        => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'action_text' => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $data = [
            'name'        => $request->name,
            'sub_title'   => $request->sub_title,
            'action_text' => $request->action_text,
            'is_special'  => $request->has('is_special'),
        ];

        if ($request->hasFile('image')) {
            $imagePath     = $request->file('image')->store('products', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $product->update($data);
        return response()->json(['success' => true, 'message' => 'Product updated successfully!']);
    }

    // =====================
    // ABOUT PAGE
    // =====================

    public function editAbout() {
        $about      = AboutPage::first();
        $coreValues = CoreValue::orderBy('sort_order')->get();
        return view('admin.about', compact('about', 'coreValues'));
    }

    public function updateAbout(Request $request) {
        $request->validate([
            'hero_title'           => 'required|string|max:255',
            'hero_description'     => 'required|string',
            'about_text'           => 'required|string',
            'about_image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'footprint_regions'    => 'nullable|string|max:255',
            'solutions_text'       => 'nullable|string',
            'vision_text'          => 'nullable|string',
            'vision_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'commitment_title'     => 'nullable|string|max:255',
            'commitment_text'      => 'nullable|string',
            'core_values_subtitle' => 'nullable|string|max:255',
            'vision_tag_1'         => 'nullable|string|max:100',
            'vision_tag_2'         => 'nullable|string|max:100',
            'vision_tag_3'         => 'nullable|string|max:100',
            'core_mission_label'   => 'nullable|string|max:255',
        ]);

        $about = AboutPage::firstOrNew([]);
        $data  = $request->except(['_token', 'about_image', 'vision_image']);

        if ($request->hasFile('about_image')) {
            $path                = $request->file('about_image')->store('about', 'public');
            $data['about_image'] = 'storage/' . $path;
        }

        if ($request->hasFile('vision_image')) {
            $path                 = $request->file('vision_image')->store('about', 'public');
            $data['vision_image'] = 'storage/' . $path;
        }

        $about->fill($data)->save();
        return response()->json(['success' => true, 'message' => 'About page updated successfully!']);
    }

    // =====================
    // CORE VALUES
    // =====================

    public function storeCoreValue(Request $request) {
        $request->validate([
            'icon'        => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'card_type'   => 'required|in:light,dark,gold',
            'sort_order'  => 'nullable|integer',
        ]);

        CoreValue::create($request->only([
            'icon', 'title', 'description', 'card_type', 'sort_order'
        ]));

        return response()->json(['success' => true, 'message' => 'Core Value added successfully!']);
    }

    public function updateCoreValue(Request $request, $id) {
        $request->validate([
            'icon'        => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'card_type'   => 'required|in:light,dark,gold',
            'sort_order'  => 'nullable|integer',
        ]);

        $value = CoreValue::findOrFail($id);
        $value->update($request->only([
            'icon', 'title', 'description', 'card_type', 'sort_order'
        ]));

        return response()->json(['success' => true, 'message' => 'Core Value updated successfully!']);
    }

    public function deleteCoreValue($id) {
        CoreValue::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => 'Core Value deleted successfully!']);
    }

    // =====================
    // PRODUCTS PAGE
    // =====================

    public function editProductsPage() {
        $productsPage = ProductsPage::first();
        return view('admin.products-page', compact('productsPage'));
    }

    public function updateProductsPage(Request $request) {
        $request->validate([
            'hero_label'       => 'required|string|max:255',
            'hero_title'       => 'required|string|max:255',
            'hero_description' => 'required|string',
            'section_title'    => 'required|string|max:255',
            'section_subtitle' => 'required|string',
        ]);

        $productsPage = ProductsPage::firstOrNew([]);
        $productsPage->fill($request->only([
            'hero_label', 'hero_title', 'hero_description',
            'section_title', 'section_subtitle'
        ]))->save();

        return response()->json(['success' => true, 'message' => 'Products page updated successfully!']);
    }
}