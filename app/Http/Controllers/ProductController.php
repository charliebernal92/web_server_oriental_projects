<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Sub_category;
use App\Sub_sub_category;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Image;
use App\Pdf_specification;
use App\Pdf_offer;
use App\Video;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Products.show_multiple', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->update_version = 0;
        $product->product_specification = $request->product_specification;
        $product->product_special_feature = $request->product_special_feature;
        $product->cat_id = $request->category;
        $product->sub_cat_id = $request->sub_category;
        $product->sub_sub_cat_id = $request->sub_sub_category;
        $product->save();

        //Store Image
        $images = $request->file('files');
        if ($images != null) {
            foreach ($images as $image) {
                $local_path = $image->store('uploaded_images');
                // $path = base_path() . '/storage/app/' . $local_path;
                $path = '/storage/app/' . $local_path;
                $image_tbl = new Image();
                $image_tbl->image_url = $path;
                $image_tbl->product_id = $product->id;
                $image_tbl->save();
            }
        }

        //Specification Pdf
        $specification_pdf = $request->file('specification_pdf');
        if ($specification_pdf != null) {
            $local_path_specification_pdf = $specification_pdf->store('uploaded_specification_pdf');
            $path = '/storage/app/' . $local_path_specification_pdf;
            $s_p_table = new Pdf_specification();
            $s_p_table->url = $path;
            $s_p_table->product_id = $product->id;
            $s_p_table->save();
        }

        //Offfers Pdf
        $offer_pdf = $request->file('offer_pdf');
        if ($offer_pdf != null) {
            $local_path_offer_pdf = $offer_pdf->store('uploaded_offer_pdf');
            $path = '/storage/app/' . $local_path_offer_pdf;
            $offer_table = new Pdf_offer();
            $offer_table->url = $path;
            $offer_table->product_id = $product->id;
            $offer_table->save();
        }

        //Store Video
        $videos = $request->file('videos');
        if ($videos != null) {
            foreach ($videos as $video) {
                $local_path = $video->store('uploaded_video');
                // $path = base_path() . '/storage/app/' . $local_path;
                $path = '/storage/app/' . $local_path;
                $video_tbl = new Video();
                $video_tbl->video_url = $path;
                $video_tbl->product_id = $product->id;
                $video_tbl->save();
            }
        }
        //echo $product;
        $products = Product::all();
        return view('Products.show_multiple', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_tbl = new Product();
        $category_table = new Category();
        $sub_category_table = new Sub_category();
        $sub_sub_category_table = new Sub_sub_category();
        $specification_pdf_table = new Pdf_specification();
        $offer_pdf_tbl = new Pdf_offer();
        $video_table = new Video();

        $product = $product_tbl::where('id', $id)->first();
        $category = $category_table::where('id', $product->cat_id)->first();
        $sub_category = $sub_category_table::where('id', $product->sub_cat_id)->first();
        $sub_sub_category = $sub_sub_category_table::where('id', $product->sub_sub_cat_id)->first();

        $specification_pdf = $specification_pdf_table::where('product_id', $product->id)->first();
        $offer_pdf = $offer_pdf_tbl::where('product_id', $product->id)->first();
        //echo $offer_pdf;
        return view('Products.show_single', compact('product', 'category', 'sub_category', 'sub_sub_category', 'specification_pdf', 'offer_pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_tbl = new Product();
        $categories = Category::all();
        $category_table = new Category();
        $sub_category_table = new Sub_category();
        $sub_sub_category_table = new Sub_sub_category();
        $specification_pdf_table = new Pdf_specification();
        $offer_pdf_tbl = new Pdf_offer();

        $product = $product_tbl::where('id', $id)->first();
        $category = $category_table::where('id', $product->cat_id)->first();
        $sub_category = $sub_category_table::where('id', $product->sub_cat_id)->first();
        $sub_sub_category = $sub_sub_category_table::where('id', $product->sub_sub_cat_id)->first();
        $specification_pdf = $specification_pdf_table::where('product_id', $product->id)->first();
        $offer_pdf = $offer_pdf_tbl::where('product_id', $product->id)->first();

        return view('Products.edit', compact('product', 'categories', 'category', 'sub_category', 'sub_sub_category', 'specification_pdf', 'offer_pdf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_tbl = new Product();
        $image_tbl = new Image();
        $product = $product_tbl::where('id', $id)->first();
        $video_tbl = new Video();

        //$product->id = $id;
        $product->product_name = $request->product_name;
        $product->update_version = $product->update_version + 1;
        $product->product_specification = $request->product_specification;
        $product->product_special_feature = $request->product_special_feature;
        $product->cat_id = $request->category;
        $product->sub_cat_id = $request->sub_category;
        $product->sub_sub_cat_id = $request->sub_sub_category;
        $product->save();

        $images = $request->file('files');
        if ($images != null) {
            /*is new uploaded images are null, it means images are not uploaded so don't delete previous images*/
            $old_images = $image_tbl::where('product_id', $id)->get();
            foreach ($old_images as $image) {

                $image_url = $image->image_url;
                $pieces = explode("/", $image_url);
                $image_url = $pieces[3] . "/" . $pieces[4];
                Storage::delete($image_url);
                $image->delete();
            }
        }
        if ($images != null) {
            foreach ($images as $image) {
                $local_path = $image->store('uploaded_images');
                // $path = base_path() . '/storage/app/' . $local_path;
                $path = '/storage/app/' . $local_path;
                $image_tbl = new Image();
                $image_tbl->image_url = $path;
                $image_tbl->product_id = $product->id;
                $image_tbl->save();
            }
        }


        $videos = $request->file('videos');
        if ($videos != null) {

            $old_videos = $video_tbl::where('product_id', $id)->get();
            foreach ($old_videos as $video) {
                $url = $video->video_url;
                $pieces = explode("/", $url);
                $url = $pieces[3] . "/" . $pieces[4];
                Storage::delete($url);
                $video->delete();
            }
            foreach ($videos as $video) {
                $local_path = $video->store('uploaded_video');
                // $path = base_path() . '/storage/app/' . $local_path;
                $path = '/storage/app/' . $local_path;
                $video_tbl = new Video();
                $video_tbl->video_url = $path;
                $video_tbl->product_id = $product->id;
                $video_tbl->save();
            }
        }


        //Specification Pdf
        $specification_pdf_table = new Pdf_specification();
        $specification_pdf = $request->file('specification_pdf');
        if ($specification_pdf != null) {
            $old_specification_pdf = $specification_pdf_table::where('product_id', $id)->first();
            //delete previous one
            if ($old_specification_pdf != null) {
                $url = $old_specification_pdf->url;
                $pieces = explode("/", $url);
                $url = $pieces[3] . "/" . $pieces[4];
                Storage::delete($url);
                $old_specification_pdf->delete();
            }

            //save new one
            $local_path_specification_pdf = $specification_pdf->store('uploaded_specification_pdf');
            $path = '/storage/app/' . $local_path_specification_pdf;
            $s_p_table = new Pdf_specification();
            $s_p_table->url = $path;
            $s_p_table->product_id = $product->id;
            $s_p_table->save();

        }

        //Offfers Pdf
        $offer_pdf_table = new Pdf_offer();
        $offer_pdf = $request->file('offer_pdf');
        if ($offer_pdf != null) {
            $old_offer_pdf = $offer_pdf_table::where('product_id', $id)->first();
            //delete previous one
            if ($old_offer_pdf != null) {
                $url = $old_offer_pdf->url;
                $pieces = explode("/", $url);
                $url = $pieces[3] . "/" . $pieces[4];
                Storage::delete($url);
                $old_offer_pdf->delete();
            }

            //save new one
            $local_path_offer_pdf = $offer_pdf->store('uploaded_offer_pdf');
            $path = '/storage/app/' . $local_path_offer_pdf;
            $offer_table = new Pdf_offer();
            $offer_table->url = $path;
            $offer_table->product_id = $product->id;
            $offer_table->save();
        }

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $root_url = "http://localhost/oriental_projects/";
        // $image_url = "uploaded_images/1fa6610931da2925bd79c85eb344a73e.jpeg";
        // $image_url = "/storage/app/uploaded_images/1fa6610931da2925bd79c85eb344a73e.jpeg";

        $product_tbl = new Product();
        $image_tbl = new Image();
        $specification_pdf_table = new Pdf_specification();
        $offer_pdf_tbl = new Pdf_offer();
        $video_tbl = new Video();

        $product = $product_tbl::where('id', $id)->first();

        $images = $image_tbl::where('product_id', $id)->get();
        foreach ($images as $image) {
            $image_url = $image->image_url;
            $pieces = explode("/", $image_url);
            $image_url = $pieces[3] . "/" . $pieces[4];
            Storage::delete($image_url);
            $image->delete();
        }

        $videos = $video_tbl::where('product_id', $id)->get();
        if ($videos != null) {
            foreach ($videos as $video) {
                $url = $video->video_url;
                $pieces = explode("/", $url);
                $url = $pieces[3] . "/" . $pieces[4];
                Storage::delete($url);
                $video->delete();
            }
        }

        $specification_pdf = $specification_pdf_table::where('product_id', $product->id)->first();
        if ($specification_pdf != null) {
            $url = $specification_pdf->url;
            $pieces = explode("/", $url);
            $url = $pieces[3] . "/" . $pieces[4];
            Storage::delete($url);
            $specification_pdf->delete();
        }

        $offer_pdf = $offer_pdf_tbl::where('product_id', $product->id)->first();
        if ($offer_pdf != null) {
            $url = $offer_pdf->url;
            $pieces = explode("/", $url);
            $url = $pieces[3] . "/" . $pieces[4];
            Storage::delete($url);
            $offer_pdf->delete();
        }

        $product->delete();
        return redirect('/product');
    }


}
