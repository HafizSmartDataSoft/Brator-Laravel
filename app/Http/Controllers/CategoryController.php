<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequestValidate;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view(
            'admin.category.add-category',
            // need to have category table
            ['categories' => Category::all()]
        );
    }

    public function editCategory($id)
    {
        // return $request;
        return view(
            'admin.category.edit-category',
            [
                'category' => Category::find($id),
                'categories' => Category::all()
            ]
        );
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category->image) {

            unlink($category->image);
        }
        $category->delete();
        return back();
    }

    public function categoryList()
    {
        return view('admin.category.category-list', [
            'categories' => Category::all()
        ]);
    }

    public function saveCategory(CategoryRequestValidate $request)
    {
        $slug = $this->slugify($request->name);
        $image_url = null;
        if ($request->image) {
            $image_url = $this->saveImage($request);
        }

        $category = Category::create([
            "name" => $request->name,
            "slug" => $slug,
            "description" => $request->description,
            "status" => $request->status,
            "parent_id" => $request->parent_id,
            "image" => $image_url,
        ]);

        if ($category) {
            // success
        }
        // fail

        return back();
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category->name != $request->name) {
            $slug = $this->slugify($request->name);
            $category->slug = $slug;

            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name'
            ]);
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;

        if ($request->image) {
            if ($category->image != null) {
                unlink($category->image);
            }
            $category->image = $this->saveImage($request);
        }
        $category->save();
        // Category::create([]);
        session()->flash('update_success', 'Category Successfully Updated !');

        return redirect('admin/category-list');
    }



    public function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'assets/frontend/category/category-image/';
        $imageUrl = $directory . $imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }

    public function slugify($text)
    {
        // Replace non-alphanumeric characters with dashes
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // Transliterate non-ASCII characters
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Convert to lowercase
        $text = strtolower($text);

        // Remove leading/trailing dashes
        $text = trim($text, '-');

        return $text;
    }
}
