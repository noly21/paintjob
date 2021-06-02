<?php

namespace App\Http\Controllers;
use App\Models\PaintModel;
use Illuminate\Http\Request;
use DB;

class PaintController extends Controller
{
    public function insert(Request $request){
        
        PaintModel::create([

            'Plate_no' => request('plate-no'),
            'Current_color' => request('current-color'),
            'Target_color' => request('target-color'),
            'action' => 'On Progress'


        ]);


           return redirect('/');

    }
    public function index(){



        return view('paint');

    }
    public function update(PaintModel $id){

            $id->update([

                'action' => 'On Progress'

            ]);

            return redirect('/');

    }
    public function update_onprogress($id){


      

        PaintModel::where('id', $id)
        ->update(['action' => 'Mark as Completed']);

      

}

    public function paintjobs(){

        $post['post_queue'] = PaintModel::where('action', 'On Progress')->offset(5)->limit(PHP_INT_MAX)->get();
        $post['post_progress'] = PaintModel::limit(5)->where('action', 'On Progress')->get();
        $post['post_completed'] = PaintModel::where('action', 'Mark as Completed')->get();
        $post['post_count'] = PaintModel::where('action', 'Mark as Completed')->count();
        $post['post_blue'] = PaintModel::where(['action' => 'Mark as Completed', 'Target_color' => 'BLUE'])->count();
        $post['post_red'] = PaintModel::where(['action' => 'Mark as Completed', 'Target_color' => 'RED'])->count();
        $post['post_green'] = PaintModel::where(['action' => 'Mark as Completed', 'Target_color' => 'GREEN'])->count();


        return view('paintjob', $post);

    }
}
