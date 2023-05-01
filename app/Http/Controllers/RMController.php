<?php

namespace App\Http\Controllers;

use App\Models\RM;
use App\Models\TodoRM as ModelsTodoRM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TodoRM;

class RMController extends Controller
{
    public function view()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            return view('addRoadMap');
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }


    //roadmap
    public function create(Request $requet)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = $requet->all();
            RM::create($data);
            return response()->json([
                'status' => 200,
                'alert' => 'success!'
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }


    public function deleted($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = RM::find($id);
            $data->delete();

            ModelsTodoRM::where('id_RM' , $id)->delete();
            return response()->json([
                'status' => 200,
                'alert' => 'success!'
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }


    public function getID($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = RM::find($id);
            return response()->json([
                'status' => 200,
                'dataRM' => $data
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }

    public function index()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $data = RM::all();
            return response()->json([
                'status' => 200,
                'dataRM' => $data
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }



    public function update(Request $request)
    {

        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $RM = $request->all();
            $data = RM::find($request->id);
            $data->update($RM);
            return response()->json([
                'status' => 200,
                'alert' => 'update OK!'
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }


    //roadmaplist
    public function addList(Request $request)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $RM = $request->all();
            ModelsTodoRM::create($RM);
            return response()->json([
                'status' => 200,
                'alert' => 'update OK!'
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function deleteList($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $dataList = ModelsTodoRM::find($id);;
            if($dataList){
                $dataList->delete();
                return response()->json([
                    'status' => 200,
                    'alert' => 'delete OK!'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'alert' => 'dữ liệu Phase đã bị xóa hoặc không tồn tại'
                ]);
            }

        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function getList($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $dataList = ModelsTodoRM::find($id);
            return response()->json([
                'status' => 200,
                'dataList' =>  $dataList,
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function updateList(Request $request)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $dataList = $request->all();
            $data = ModelsTodoRM::find($request->id);
            $data->update($dataList);
            return response()->json([
                'status' => 200,
                'alert' => 'update OK!'
            ]);
        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function isDone($id)
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $dataList = ModelsTodoRM::find($id);
            if($dataList){
                $dataList->is_done = !$dataList->is_done;
                $dataList->save();
                return response()->json([
                    'status' => 200,
                    'action' =>  $dataList->is_done
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'action' => 'dữ liệu Phase đã bị xóa hoặc không tồn tại'
                ]);
            }

        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function indexList()
    {
        $Login = Auth::guard('admin_managers')->user();
        if ($Login) {
            $dataList = ModelsTodoRM::join('r_m_s', 'todo_rms.id_RM', 'r_m_s.id')->whereColumn( 'todo_rms.id_RM' , 'r_m_s.id')->select('todo_rms.*', 'r_m_s.phase')->get()->groupBy('id_RM');
            return response()->json([
                'status' => 200,
                'dataLists' =>  $dataList,
            ]);

        } else {
            toastr()->info('vui lòng đăng nhập trước');
            return redirect('/');
        }
    }
    public function showRM(){
        $dataList = ModelsTodoRM::join('r_m_s', 'todo_rms.id_RM', 'r_m_s.id')->whereColumn( 'todo_rms.id_RM' , 'r_m_s.id')->select('todo_rms.*', 'r_m_s.phase')->get()->groupBy('id_RM');
        return response()->json([
            'status' => 200,
            'dataLists' =>  $dataList,
        ]);

    }

}
