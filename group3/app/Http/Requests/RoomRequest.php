<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class RoomRequest extends FormRequest
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
                'hotel_name' => ['required'],
                'room_number' => ['required'],
                'room_type' => ['required'],
                'service' => ['required'],
                'price' => ['required'],
                'status' => ['required'],
            ];
        }
    }
?>