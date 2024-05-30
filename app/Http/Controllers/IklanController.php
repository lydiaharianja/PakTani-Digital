<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function index()
    {
        $iklan = Iklan::orderBy('created_at', 'DESC')->get();
        return view('iklan.list', compact('iklan'));
    }

    public function create()
    {
        return view('iklan.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // dd($request);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "/images/$profileImage";
        }

        Iklan::create($input);

        return redirect('/iklan');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        Iklan::find($id)->delete();
        return redirect('/iklan');
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $iklan = Iklan::find($id)->first();
        return view('iklan.update', compact('iklan'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $input = $request->all();
        // dd($input);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "/images/$profileImage";
        } else {
            unset($input['image']);
        }
        $updated = Iklan::find($id)->update($input);

        return redirect("/iklan");
    }
}
