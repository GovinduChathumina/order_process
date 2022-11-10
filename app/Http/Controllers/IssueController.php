<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::orderBy('id','desc')->paginate(5);
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
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
            'free_issue_label' => 'required',
            'type' => 'required',
            'purchase_product' => 'required',
            'free_product' => 'required',
            'purchase_quantity' => 'required',
            'free_quantity' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required',
        ]);
        
        Issue::create($request->post());

        return redirect()->route('issues.index')->with('success','Issue has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('issues.show',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        return view('issues.edit',compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'free_issue_label' => 'required',
            'type' => 'required',
            'purchase_product' => 'required',
            'free_product' => 'required',
            'purchase_quantity' => 'required',
            'free_quantity' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required',
        ]);
        
        $issue->fill($request->post())->save();

        return redirect()->route('issues.index')->with('success','Issue Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $product->delete();
        return redirect()->route('issues.index')->with('success','Issue has been deleted successfully'); 
    }
}
