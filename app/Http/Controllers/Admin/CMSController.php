<?php

namespace App\Http\Controllers\Admin;

use App\Cms;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CMSController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cms = Cms::all();

        return view('backEnd.admin.cms.index', compact('cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'section' => 'required',
            'title' => 'required|max:512',
            'slug' => 'required|max:512|unique:cms,slug',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:512',
        ]);


        $fileName = time().'_'.$request->slug.'.'.$request->image->extension();
        $subPath = '/uploads/cms/';
        $path = public_path($subPath);


        if ($request->hasFile('image')) {
            $request->image->move($path,$fileName);
        }
        $create = $request->all();
        $create['image']= $subPath.$fileName;

        Cms::create($create);

        Session::flash('message', 'CM added!');
        Session::flash('status', 'success');

        return redirect('admin/cms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cms = Cms::findOrFail($id);

        return view('backEnd.admin.cms.show', compact('cms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cms = Cms::findOrFail($id);

        return view('backEnd.admin.cms.edit', compact('cms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'section' => 'required',
            'title' => 'required|max:512',
            'slug' => 'required|max:512|unique:cms,slug,'.$id,
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:512',
        ]);
        $fileName = time().'_'.$request->slug.'.'.$request->image->extension();
        $subPath = '/uploads/cms/';
        $path = public_path($subPath);
        if ($request->hasFile('image')) {
            $request->image->move($path,$fileName);
        }
        $create = $request->all();
        $create['image']= $subPath.$fileName;


        $cm = Cms::findOrFail($id);
        $cm->update($create);

        Session::flash('message', 'CM updated!');
        Session::flash('status', 'success');

        return redirect('admin/cms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cm = Cms::findOrFail($id);

        $cm->delete();

        Session::flash('message', 'CMS Post deleted!');
        Session::flash('status', 'success');

        return redirect('admin/cms');
    }

}
