<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateIntroduce;
use App\Models\IntroduceSndg;
use Illuminate\Http\Request;

class IntroduceSndgController extends Controller
{

    public function View(){
        return view('SNDGSetting.editIntro');
    }

    public function index()
    {
        $dataInfo = IntroduceSndg::all();
        return response()->json([
            'status' => 1,
            'dataIntroduce' =>$dataInfo
        ]);
    }

    public function getIdIntro($id)
    {
        $idInfo = IntroduceSndg::find($id);
        if($idInfo){
            return response()->json([
                'status' => true,
                'dataIntroduce' =>$idInfo
            ]);
        }else{
            return response()->json([
                'status' => 'sida vkl',
            ]);
        }
    }


    public function UpdateInfo(UpdateIntroduce $request)
    {   $info = $request->all();
        $data = IntroduceSndg::find($request->id);
        $data->update($info);

        return response()->json(
            ['status' => true]
        );

    }

}
