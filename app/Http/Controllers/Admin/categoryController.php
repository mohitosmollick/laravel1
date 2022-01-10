<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::simplePaginate(5);

        return view('Admin.category.manage',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([
                'name'      => 'required|string|unique:categories',
                'status'    => 'required|string',
            ]);

        try {
//            $category = new Category();
//            $category->user_id =  auth()->id();
//            $category->name    =  $request->name;
//            $category->slug    =  strtolower(str_replace(' ','_', $request->name));
//            $category->status  =  $request->status;
//            $category->save();
            Category::create([
               'user_id' => auth()->id(),
                'name'   => $request->name,
                'slug'   => strtolower(str_replace(' ', '_', $request->name)),
                'status' => $request->status,

            ]);

            session()->flash('type', 'success');
            session()->flash('message','Category add successfully');
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Failed to add category');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $category =  Category::find($id);
       return view('Admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  Category::find($id);
        if ($category)
        return view('Admin.category.edit',compact('category'));
        else
            return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|unique:categories',
            'status'    => 'required|string',
        ]);

        try {
            $category = Category::find($id);

            $category->user_id =  auth()->id();
            $category->name    =  $request->name;
            $category->slug    =  strtolower(str_replace(' ','_', $request->name));
            $category->status  =  $request->status;
            $category->update();

            session()->flash('type', 'success');
            session()->flash('message','Update successfully');
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message','Not Updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cat = Category::find($id);
            $cat->delete();

            session()->flash('type', 'success');
            session()->flash('message','Delete Successfully');
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message','Not deleted');
        }
        return redirect()->back();
    }
}
