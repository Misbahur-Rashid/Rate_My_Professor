<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteSetting;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function index(){
        Session::put('page','dashboard');
        $site=SiteSetting::where('status',1)->get();
        return view('admin.sitesetting.index',compact('site'));
    }
    public function addEdit(Request $request,$id=null){
        if($id==""){
            $title="Sitesetting Create Page";
            $message="Sitesetting Create Page Successfully";
            $site=new SiteSetting();

        }else{
            $title="Sitesetting Update Page";
            $message="Sitesetting Update Page Successfully";
            $site=SiteSetting::find($id);

        }
        if($request->isMethod('post')){
            $this->validate($request,
            [
                'title_h'=>'required',
            ]
        );
        $data=$request->all();
        $site->title_h=$data['title_h'];
        $site->title_a=$data['title_a'];
        $site->title_c=$data['title_c'];
        $site->description_h=$data['description_h'];
        $site->description_a=$data['description_a'];
        $site->description_c=$data['description_c'];
        if($request->hasFile('logo')){
            $image_tmp = $request->file('logo');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $image_name=$image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName =$image_name.'-'.rand(111,99999).'.'.$extension;
                $sitelogo_path_one = 'image/site/'.$imageName;
                Image::make($image_tmp)->resize(50,52)->save($sitelogo_path_one);
                $site->logo = $imageName;
            }
        }
        if($request->hasFile('banner_a')){
            $image_tmp = $request->file('banner_a');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $image_name=$image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $imageName =$image_name.'-'.rand(111,99999).'.'.$extension;
                $sitebanner_path_one = 'image/site/banner/'.$imageName;
                Image::make($image_tmp)->resize(1903,634)->save($sitebanner_path_one);
                $site->banner_a = $imageName;
            }
        }
        $site->save();
        Session::flash('success',$message);
        return redirect('admin/get-sitesetting');
        }
        return view('admin.sitesetting.create',compact('site','title'));

    }
}
