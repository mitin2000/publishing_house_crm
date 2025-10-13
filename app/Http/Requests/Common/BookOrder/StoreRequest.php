<?php

namespace App\Http\Requests\Common\BookOrder;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'string|nullable',
 //           'phone_prefix' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'address' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Это поле необходимо для заполнения',
            'firstname.string' => 'Имя должно быть строкой',
            'lastname.required' => 'Это поле необходимо для заполнения',
            'lastname.string' => 'Фамилия должна быть строкой',
            'middlename.string' => 'Имя должно быть строкой',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату email',
            'phone.required' => 'Это поле необходимо для заполнения',
            'address.required' => 'Это поле необходимо для заполнения',
            'address.string' => 'Адрес должен быть строкой',
        ];
    }
/*
    protected function passedValidation() {
        $data = $this->validator->getData();

        $this->validator->setData( [
                'phone' => explode('+' . $data['phone_prefix'], $data['phone'])[1],
            ] + $data);
    }
*/
}
