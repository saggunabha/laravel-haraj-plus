<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\ReportService;
use App\Models\DeactivateUser;
use App\Models\Rating;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $reports = $this->service->getReportsService();
        return view('admin.reports.index', compact('reports'));
    }



    public function commentReports()
    {

        $reports=Report::with('user','product','rate')->where('rate_id','<>',null)->orderby('created_at','desc')->get();
        return view("admin.reports.commentReports",compact('reports'));

    }

    /**
     * @param Request $request
     * 0 for reports
     * 1 for ratings
     */


    public function block_reporter(Request $request){

        $data=$request->all();
        block(Report::find($data['id']),$request->all(),0);

        return response()->json(['msg'=>'تم الحظر بنجاح:)']);

    }
    public function  block_commenter(Request $request)
    {
       
        $data=$request->all();
        block(Rating::find($data['id']),$request->all(),1);
        return response()->json(['msg'=>'تم الحظر بنجاح:)']);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroyReportService($id);
        return response()->json(['success' => 'true']);
    }

    public function deleteComment($id)
    {
         $comment = Rating::with('rates')->where('id',$id)->first();
         foreach($comment->rates as $rate)
         {
             $rate->delete();
         }
         $comment->delete();
        return response()->json(['success' => 'true']);
    }
}
