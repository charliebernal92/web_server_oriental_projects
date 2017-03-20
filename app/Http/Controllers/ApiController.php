<?php

namespace App\Http\Controllers;

use App\Sub_category;
use App\Sub_sub_category;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Image;
use App\Pdf_specification;
use App\Pdf_offer;
use App\Video;
use App\Abouts;


class ApiController extends Controller
{
    public function showAll()
    {
        $response = array();

        $products = Product::all();
        $categories = Category::all();
        $sub_categories = Sub_category::all();
        $sub_sub_categories = Sub_sub_category::all();
        $images = Image::all();
        $pdf_specifications = Pdf_specification::all();
        $pdf_offers = Pdf_offer::all();
        $videos = Video::all();
        $about_us=Abouts::all();


       $response["categories"] = $categories;
        $response["sub_categories"] = $sub_categories;
        $response["sub_sub_categories"] = $sub_sub_categories;
        $response["products"] = $products;
        $response["images"] = $images;
        $response["pdf_specifications"] = $pdf_specifications;
        $response["pdf_offers"] = $pdf_offers;
        $response["videos"] = $videos;
        $response["about_us"] = $about_us;

        return Response::Json($response);
    }
}
