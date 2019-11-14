<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(User::$updateRules, Patient::$updateRules);
    }
}
