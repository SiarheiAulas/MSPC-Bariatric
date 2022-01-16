<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrimaryDataUpdateRequest extends FormRequest
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
             'surname'=>'required|alpha_dash|min:2',
             'firstname'=>'required|alpha_dash|min:2',
             'lastname'=>'nullable|alpha_dash|min:2',
             'sex'=>'required|alpha|min:1|max:1',
             'phone'=>'nullable|numeric',
             'country'=>'required|alpha|min:2|max:30',
             'adress'=>'nullable|min:10',
             'diagnosis'=>'required|numeric|min:0|max:3|digits_between:1,1',
             'describediagnosis'=>'required|min:10',
             'birthdate'=>'required|date|after:1945-01-01',
             'age'=>'required|numeric|digits_between:2,3',
             'surgery'=>'nullable|alpha|min:2|max:5',
             'surgerytype'=>'nullable|alpha',
             'simultaneous'=>'nullable|digits_between:1,1|min:0|max:1',
             'describesurgery'=>'nullable',
             'surgerydate'=>'nullable|date|after:2014-01-01',
             'dischargedate'=>'required|date|after:surgerydate',
             'surgeryduration'=>'nullable|numeric|digits_between:2,3',
             'height'=>'nullable|numeric|digits_between:2,3',
             'complicated'=>'nullable|digits_between:1,1|min:0|max:1',
             'describecomplications'=>'nullable',
             'bleedwithin30daysofsurgery'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'fundingcategory'=>'nullable|numeric|min:1|max:3|digits_between:1,1',
             'hasthepatienthadapriorgastricbaloon'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'hasthepatienthadbariatricsurgeryinthepast'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'increasedriskofdvtorpe'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'leakwithin30daysofsurgery'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'obstructionwithin30daysofsurgery'=>'nullable|numeric|min:0|max:1|digits_between:1,1',
             'operativeapproach'=>'required|numeric|min:1|max:4|digits_between:1,1',
             'patientstatusatdischarge'=>'required|numeric|min:0|max:1|digits_between:1,1',
             'reoperationwithin30daysofsurgery'=>'nullable|numeric|min:0|max:1|digits_between:1,1'
        ];
    }
}
