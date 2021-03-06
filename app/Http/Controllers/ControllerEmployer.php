<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Validator;
use Illuminate\Http\Request;
use App\employer;
use App\Http\Requests\EmployerRequest;

class ControllerEmployer extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

    public function getEmployers(){
        $employer = employer::all();
      return view('viewAdmin.admin_employer',['employer' => $employer]);
    }
    public function getAddEmployer(){
        return view('viewAdmin.addEmployer');
    }

    public function postAddEmployer(EmployerRequest $req){
        $file_image_avatar=$req->file('EmployerImageAvatar')->getClientOriginalName();
        $file_image_cover=$req->file('EmployerImageCover')->getClientOriginalName();
        $employer=new employer;
        $employer->Name=$req->txt_EmployerName;
        $employer->Description=$req->txt_EmployerDecription;
        $employer->id_Location=$req->txt_EmployerLocation;
        $employer->url_avatar=$file_image_avatar;
        $employer->url_bia=$file_image_cover;
        $req->file('EmployerImageAvatar')->move('images/',$file_image_avatar);
        $req->file('EmployerImageCover')->move('images/',$file_image_cover);
        $employer->save();
        return redirect()->action('ControllerEmployer@getEmployers')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete add employer']);
    }

    public function getDeleteEmployer($id){
        $employer=employer::find($id);
        $employer->delete($id);
        return redirect()->action('ControllerEmployer@getEmployers')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete delete Post']);
    }

    public function getEditEmployer($id){
        $data=employer::find($id);
        $parent=employer::select('id','Name','Description','id_Location','url_avatar','url_bia')->get()->toArray();
        return view('viewAdmin.editEmployer',compact('data','parent','id'));
    }

    public function postEditEmployer(EmployerRequest $req,$id){
        $employer=employer::find($id);
        $file_image_avatar=$req->file('EmployerImageAvatar')->getClientOriginalName();
        $file_image_cover=$req->file('EmployerImageCover')->getClientOriginalName();
        $employer=new employer;
        $employer->Name=$req->txt_EmployerName;
        $employer->Description=$req->txt_EmployerDecription;
        $employer->id_Location=$req->txt_EmployerLocation;
        $employer->url_avatar=$file_image_avatar;
        $employer->url_bia=$file_image_cover;
        $req->file('EmployerImageAvatar')->move('images/',$file_image_avatar);
        $req->file('EmployerImageCover')->move('images/',$file_image_cover);
        $employer->save();
        return redirect()->action('ControllerEmployer@getEmployers')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete add employer']);

    }
}
