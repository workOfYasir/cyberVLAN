<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Return View For Add Appliences
     */
    public function creates()
    {
        $parent_categories = Category::Where('parent_category', '=', '')->orWhere('parent_category', '=', 0)->get();
        return view('backend.pages.category.store',['parent_categories'=>$parent_categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request, ['category_title' => 'required']);
        $categories = new Category;
        $categories->category_name = $request->get('category_title');
        if ($request->get('parent_category') == '' || $request->get('parent_category') == null) {
            $categories->parent_category = 0;
        } else {
            $categories->parent_category = $request->get('parent_category');
        }
        $categories->status = $request->get('category_status');
        $categories->slug = str::slug($request->category_title, '-');
        $categories->save();
        return redirect()->route('category.index');
    }

    public function index()
    {
        // $category = Category::all();
        $parent_categories = Category::Where('parent_category', '=', '')->orWhere('parent_category', '=', 0)->get();
        $category = Category::with('mainCategory')->get();
//    dd($category[1]->mainCategory->category_name);
        $user = Auth::user();
        return view('backend.pages.category.index', ['category' => $category, 'user' => $user, 'parent_categories' => $parent_categories]);
    }


    public function remove(Category $category, $id)
    {
        $user = Auth::user();
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }

    public function change($id)
    {
        $user = Auth::user();
        $category=Category::find($id);
        $parent_categories = Category::Where('parent_category', '=', '')->orWhere('parent_category', '=', 0)->get();
        return ([$category,$user,$parent_categories]);

    }


    public function update(Request $request)
    {
        if ($request->status == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        if ($request->get('parent_category') == '' || $request->get('parent_category') == null) {
            $parent_category = 0;
        } else {
            $parent_category = $request->get('parent_category');
        }
        Category::where('id', $request->category_id)
            ->update([
                'category_name' => $request->category_title,
                'status' => $status,
                'parent_category' => $parent_category,
                'slug' => $request->category_title . '-',
            ]);

        return redirect()->route('category.index');
    }


    public function changeajaxx(Request $request)
    {
        $user = Auth::user();
        Category::find($request->id)->update(['status' => $request->status, 'user' => $user]);
        return response()->json(['success' => 'Status Changes Successfully', 'status' => $request->status]);
    }
}
