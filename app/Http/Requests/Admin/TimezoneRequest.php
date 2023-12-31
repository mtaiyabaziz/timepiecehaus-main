<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TimezoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->hasRole('admin'))
            return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = is_null($this->timezone) ? NULL : $this->timezone->id;
        $rules = [
            'name' => 'required|unique:timezones,name,' . $id,
            'identifier' => 'required',
            'status_id' => 'required|exists:statuses,id'
        ];

        return $rules;
    }
}
