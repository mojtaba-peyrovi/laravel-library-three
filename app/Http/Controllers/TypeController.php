<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {

        $types = Type::all();
        // $types = Type::where('color', '=', Input::get('color'))->first();
        return view('types.create', compact('types'));
    }

    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title' => 'required|unique:types'
        ]);

        Type::create([
            'title' => ucwords(request('title')),
            'color' => request('color')
        ]);
        flash('Type Added!')->error();
        return redirect('/types');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/types');
    }

    public function edit($id)
    {
        $types = Type::all();
        $type = Type::find($id);
        return view('types.edit', compact('type', 'types','id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $type = Type::find($id);
        $type->title = $request->get('title');
        $type->color = $request->get('color');
        $type->save();



        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        return redirect()->route('types.show',[$type]);

    }
}
