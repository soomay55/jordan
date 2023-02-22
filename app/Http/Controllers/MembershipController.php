<?php

namespace App\Http\Controllers;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipRequest;
use App\Models\Membership;

class MembershipController extends Controller
{
    use UploadAble;
    public function index(){

        return 1;
    }

    public function create(){
        return view('admin.membership.create');
    }
    
    public function store(MembershipRequest $request){
        //dd($request->all());

        $data=[
            'amount' => $request->amount,
            'count' => $request->count,
            'member'=>$request->member
        ];
        foreach(config('translatable.locales') as $locale){
            $data[$locale] =$request->$locale;
        }
        $image_name='';
        if ($request->has('featured_image')) {
            $image_name = $this->uploadOne($request->file('featured_image'), 'campaign');
            $data['featured_image']=$image_name;
            }

        Membership::create($data);
        return 1;
    }


}
