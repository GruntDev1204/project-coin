<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkEdit;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{

    public function index()
    {
        $data = Link::all();
        return response()->json([
           'dataLink' => $data
        ]);
    }


    public function View()
    {
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            return view('editLink');
        }else{
            return redirect('/login');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getId($id)
    {
        $dataLink = Link::find($id);
        if($dataLink){
            return response()->json([
                'dataLink' => $dataLink,
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => 'sida r',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function UpdateLink(LinkEdit $link)
    {
        $data = $link->all();
        $LinkEdit = Link::find($link->id);
        $LinkEdit->update($data);
        return response()->json(
                [
                    'status' =>true,
                    'alert' => 'Update SuccessFully',
                ]
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
