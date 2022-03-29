<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Show specified view.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Return View For Add Product
     */
    public function ajaxservice()
    {
        $service = Category::with('services')->get();
        return $service;
    }




    public function store(Request $request)
    {

        $this->validate($request, [

            'service_title' => 'required',
            'service_category' => 'required'

        ]);

        $service = new Service;
        $service->name = $request->get('service_title');
        $service->category_id = $request->get('service_category');
        $service->status = $request->get('service_status');
        $service->description = $request->get('service_description');

        $service->save();

        return redirect()->route('service.index');
    }

    public function index()
    {
        $user = Auth::user();
        $service = Service::with('category')->get();
        $category = Category::Where('parent_category', '=', '')->orWhere('parent_category', '=', 0)->with('subCategory')->get();
   
        return view('backend.pages.service.index', ['service' => $service, 'category' => $category, 'user' => $user]);
    }
    public function allServices()
    {
        $user = Auth::user();
        $service = Service::with('category')->get();
        $category = Category::Where('parent_category', '=', '')->orWhere('parent_category', '=', 0)->with('subCategory')->get();
        return view('frontend.services', ['service' => $service, 'category' => $category, 'user' => $user]);
    }


    public function remove(Service $service, $id)
    {

        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index');
    }

    public function change(Service $service, $id)
    {

        $user = Auth::user();
        $service = Service::find($id);
        $category = Category::all();
        return ([$service, $category]);
    }


    public function update(Request $request)
    {
        if ($request->service_status == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        Service::where('id', $request->service_id)
            ->update([
                'category_id' => $request->service_category,
                'name' => $request->service_title,
                'status' => $status,
            ]);

        return redirect()->route('service.index');
    }
}
