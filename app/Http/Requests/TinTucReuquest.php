<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucReuquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;// bat cai nay true moi validate duoc
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // loi gi gi ra
        return [
            //
        ];
    }
    // co cai function messegase de show lôi ra
    function messegase()
    {

    }
}
