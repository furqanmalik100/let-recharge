<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs = Faq::all();
        return view('admin.cms.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cms.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq_add = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status ?? "0",
        ]);
        $notification = array(
            'message' => 'FAQ Added Successfully!'
        );
        return redirect()->route('faq.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $faqs = Faq::findOrFail($id);
        return view('admin.cms.faq.edit', compact('faqs'));
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
        //
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq_update = Faq::where('id',$id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status ?? "0",
        ]);
        $notification = array(
            'message' => 'FAQ Updated Successfully!'
        );
        return redirect()->route('faq.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Faq::find($id)->delete();
        return response()->json();
    }

    public function statusChange($id){
        $faqs = Faq::findOrFail($id);

        if ($faqs->status == "1") {
            $faqs->status = "0";
            $faqs->save();
        } else {
            $faqs->status = "1";
            $faqs->save();
        }

        return response()->json();
        
    }
}
