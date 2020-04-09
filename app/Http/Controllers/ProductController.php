<?php
namespace App\Http\Controllers;
use App\Link;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::select('id','sort','name','link','status')->orderBy('sort','desc')->get();
        return view('link.index',['links'=>$links]);
    }

}
