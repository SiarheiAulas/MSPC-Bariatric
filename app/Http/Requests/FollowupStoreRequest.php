<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FollowupStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patientid'=>'required|numeric',
            'date'=>'required|date|after:2014-01-01',
            'weight'=>'nullable|numeric|digits_between:2,3',
            'neck'=>'nullable|numeric|digits_between:2,2',
            'ejfract'=>'nullable|numeric|digits_between:2,2',
            'jointpath'=>'nullable',
            'wbc'=>'nullable|numeric|min:0|max:40',
            'hgb'=>'nullable|numeric|min:0|max:260',
            'gluc'=>'nullable|numeric|min:0|max:40',
            'tbil'=>'nullable|numeric|min:0|max:600',
            'dbil'=>'nullable|numeric|min:0|max:600',
            'tprot'=>'nullable|numeric|min:0|max:100',
            'albumine'=>'nullable|numeric|min:0|max:100',
            'amylase'=>'nullable|numeric|min:0|max:500',
            'ast'=>'nullable|numeric',
            'alt'=>'nullable|numeric',
            'na'=>'nullable|numeric|min:0|max:150',
            'k'=>'nullable|numeric|min:0|max:10',
            'ca'=>'nullable|numeric|min:0|max:5',
            'ca_ion'=>'nullable|numeric|min:0|max:2',
            'cl'=>'nullable|numeric|min:0|max:120',
            'trig'=>'nullable|numeric|min:0|max:15',
            'chol'=>'nullable|numeric|min:0|max:15',
            'ldl'=>'nullable|numeric|min:0|max:15',
            'hdl'=>'nullable|numeric|min:0|max:15',
            'proteinuria'=>'nullable',
            'rbc'=>'nullable|numeric|min:0|max:15',
            'plt'=>'nullable|numeric|min:0|max:550',
            'sad'=>'nullable|numeric|min:0|max:250',
            'dad'=>'nullable|numeric|min:0|max:150',
            'endo'=>'nullable',
            'us'=>'nullable',
            'polysomno'=>'nullable',
            'ct'=>'nullable',
            'dm'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'nash'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'malabs'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'medication'=>'nullable',
            'nsurgery'=>'nullable|alpha|min:2|max:5',
            'describensurgery'=>'nullable',
            'nsurgeryduration'=>'nullable|numeric|min:0|max:300',
            'nsurgerydate'=>'nullable|date|after:2014-01-01',
            'ncomplicated'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'describencomplication'=>'nullable',
            'confirmedsleepapnoea'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'depressiononmedication'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'dyslipidemiaonmedication'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'gerdgord'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'isprimaryflw'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'musculoskeletalpainonmedication'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'patientstatus'=>'nullable|numeric|digits_between:1,1|min:0|max:1',
            'typeofdiabetesmedication'=>'nullable|numeric|digits_between:1,1|min:1|max:2',
            'sf36_pf'=>'nullable|numeric',
            'sf36_rp'=>'nullable|numeric',
            'sf36_bp'=>'nullable|numeric',
            'sf36_gh'=>'nullable|numeric',
            'sf36_vt'=>'nullable|numeric',
            'sf36_sf'=>'nullable|numeric',
            'sf36_re'=>'nullable|numeric',
            'sf36_mh'=>'nullable|numeric',
            'sf36_ph'=>'nullable|numeric',
            'sf36_meh'=>'nullable|numeric',
            'debq_restrained'=>'nullable|numeric',
            'debq_emotional'=>'nullable|numeric',
            'debq_external'=>'nullable|numeric'
        ];
    }
}
