<?php

namespace App\Http\Requests;

use App\Models\ImageSetting;
use App\Models\TypeWorkOn;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'sku' => 'required|string|max:255|unique:products',
            'parent_category' => 'required',
            'make_id' => 'required',
            'year_id' => 'required',
            'model_id' => 'required',
            'name' => 'required',
            // 'sku' => 'required',
        ];
    }

    public function messages()
    {
        // dd(0);
        // $workOns = TypeWorkOn::where('work_on', 'product')->get();
        // $workOns = $workOns->pluck('type_id');
        // $imageSettings = ImageSetting::find($workOns)->where('status', 1);
        // // $deleted = ProductImage::where('product_id', $product->id)->delete();
        // // $count = 0;
        // foreach ($imageSettings as $imageSetting) {
        //     $typeName = $imageSetting->type_name;
        //     $images = session()->get('product' . $typeName);
        //     if (is_array($images)) {
        //         // if ($count == 0) {
        //         //     $gallaryImages = ProductImage::where('product_id', $product->id)->get();
        //         //     foreach ($gallaryImages as $gallaryImage) {
        //         //         unlink($gallaryImage->image);
        //         //     }
        //         //     $deleted = ProductImage::where('product_id', $product->id)->delete();
        //         // }
        //         foreach ($images as $image) {
        //             unlink($image);
        //         }
        //     }
        //     // $count++;
        //     session()->forget('product' . $typeName);
        // }

        // $images = session()->get('product.gallery');
        // // return $images;
        // if (is_array($images)) {
        //     foreach ($images as $image) {
        //         unlink($image);
        //     }
        //     session()->forget('product.gallery');
        // }
        return [
            'name.required' => 'The name is required.',
            'sku.required' => 'The Sku  field must be unique.',
            'parent_category.required' => 'The Category field is required.',
            'make_id.required' => 'The Make is required.',
            'year_id.required' => 'The Year is required.',
            'model_id.required' => 'The Model is required.',
            'description.required' => 'The Make is required.',
            'base_price.required' => 'The Year is required.',
            'sale_price.required' => 'The Model is required.',
            'cost_price.required' => 'The Model is required.',
        ];
    }
}
