<?php

namespace App\Http\Controllers\Student;
use Auth;
use Image;
use App\JernalSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {

        $files=JernalSend::where('user_id',Auth::user()->id)->latest()->get();
        return view('student.SendFile.index',compact('files'));
    }
    public function create()
    {
        return view('student.SendFile.create');
    }

    public function storefile(Request $request){
        DB::transaction(function () use($request){
            $this->validate($request,[
                'jernal_id'=>'required',
                'description'=>'required',
                "file" => 'mimes:pdf|max:10000',
            ]);
            if($request->hasFile('image')){
                $image_tmp=$request->file('image');
                if($image_tmp->isValid()){
                    $extention=$image_tmp->getClientOriginalExtension();
                    $imageName= rand(111,99999).'.'.$extention;
                    $imagePath='image/student/'.$imageName;
                    Image::make($image_tmp)->resize(500,300)->save($imagePath);
                }else{
                    $imageName="";
                }
              }

              if($request->hasFile('file')){
                $file=$request->file('file');
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('image/pdf/',$fileName);
              }
            $jernalSend=new JernalSend();
            $jernalSend->user_id = Auth::id();
            $jernalSend->jernal_id=$request->jernal_id;
            $jernalSend->description=$request->description;
            $jernalSend->image=$imageName;
            $jernalSend->file=$fileName;
            $jernalSend->save();


        });
        return redirect()->route('student.student.index');
      }

      public function show($id){
          $data=JernalSend::find($id);
          return view('student.pdf.pdf',compact('data'));
      }
      public function download($file){
        return response()->download('image/pdf/'.$file);
    }
}
