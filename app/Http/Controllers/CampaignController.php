<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;

class CampaignController extends Controller
{
    use UploadAble;

    
    
    public function  index(){
        
        $data=[
            "category" => "child",
            "title" => "Help a child",
            "description" => "lorem text to help children whole around the world, your contribution can bring change to  life for ever so pleae do think about the change thats going take place after your contribution.",
            "featured_image" => "image.jpg",
            "video_link" => "hhttpproxy.jpg",
            "start_date" => Carbon::now(),
            "end_date" => Carbon::now(),
            "preloaded_amount" => [
                "1"=>"100",
                "2"=>"200",
                "3"=>"300"
            ],
            "goal"=>1000,
            "available_fund"=>200,
            "status"=>"pending"
        ];
        //dd(app()->getLocale());
        $Campaign=Campaign::translatedIn(app()->getLocale())->get();
        //dd($Campaign[0]['title']);
        return view('admin.campaign.index',compact('Campaign'));
    }

    public function create(){
        return view('admin.campaign.create');
    }
    public function store(CampaignRequest $request){
            //dd($request->all());
             $request->validated();
        // $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     "description" => "required",
        //     "featured_image" => "required|mimes:jpeg,png,jpg",
        //     "end_date" => "required|date|after:tomorrow",            
        //     "goal"=>"required",
        // ]);
        $image_name="";        
        
            //"featured_image" => $image_name,
        $data=[
            "category" => "child",
            
            
           
            "video_link" =>$request->video_link,
            "start_date" => Carbon::now(),
            "end_date" => $request->end_date,
            "preloaded_amount" =>$request->preloaded_amount,
            "goal"=>$request->goal,
            
            "status"=>"pending"
        ];
        
        foreach(config('translatable.locales') as $locale){
                $data[$locale] =$request->$locale;
        }
        if ($request->has('featured_image')) {
            $image_name = $this->uploadOne($request->file('featured_image'), 'campaign');
            $data['featured_image']=$image_name;
            }
        //dd($data);
        $Campaign=Campaign::create($data);
        if($Campaign){
            return redirect()->route('admin.campaign.index')->with('success','New Campaign Success created successfully');
        }else{
            return back()->withInput();
        }
        
    }
    public function edit($id){
        $Campaign=Campaign::find($id);
        return view('admin.campaign.edit',compact('Campaign'));
    }
    public function update(Request $request ,$id){
        $validated = $request->validate([
            'title' => 'required|max:255',
            "description" => "required",
            "featured_image" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "end_date" => "required|date|after:tomorrow",            
            "goal"=>"required",
        ]);
        $image_name="";        
        if ($request->has('featured_image')) {
            $image_name = $this->uploadOne($request->file('featured_image'), 'campaign');
            }
            $Campaign=Campaign::find($id);
        $data=[
            "category" => "child",
            "title" => $request->title,
            "description" => $request->description,
            "featured_image" => $request->file('featured_image') ? $image_name :$Campaign->featured_image,
            "video_link" =>$request->video_link,
            "start_date" => Carbon::now(),
            "end_date" => $request->end_date,
            "preloaded_amount" =>$request->preloaded_amount,
            "goal"=>$request->goal,           
            
        ];
        $Campaign->update($data);
        
        return redirect()->route('admin.campaign.index')->with('success','Updated campaign successfully');
    }
    
}
