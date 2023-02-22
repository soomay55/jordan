<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return $this->authorize('store',Campaign::class);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules=[
            'en.title' => 'required',
            'en.description' => 'required',
            'amount'=>'required',
        ];
        foreach(config('translatable.locales') as $locale){
            $rules[$locale.'.title'] = 'required|string';
            $rules[$locale.'.description'] = 'required|string';
        }
        dd($rules);
        return $rules;
    }
}
