<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

class SettingController extends BaseController
{
    use UploadAble;
    //

    public function index()
{
    $this->setPageTitle('Settings', 'Manage Settings');
    //return true;
    return view('admin.settings.index');
}

/**
 * @param Request $request
 */
public function update(Request $request)
{
    //dd($request->all());
    if ($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)) {

        if (config('settings.site_logo') != null) {
            $this->deleteOne(config('settings.site_logo'));
        }
        $logo = $this->uploadOne($request->file('site_logo'), 'img');
        Setting::set('site_logo', $logo);

    } elseif ($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)) {

        if (config('settings.site_favicon') != null) {
            $this->deleteOne(config('settings.site_favicon'));
        }
        $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
        Setting::set('site_favicon', $favicon);

    } else {

        $keys = $request->except('_token');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }
        //return back()->with('success','Settings updated successfully');

    }
    
    return $this->responseRedirectBack('Settings updated successfully.', 'success');
}
function demo(){
    return view('admin.loginform');
}
}
