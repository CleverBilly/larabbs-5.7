<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class TopicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|string',
                    'body' => 'required|string',
                    'category_id' => 'required|exists:categories,id',
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'string',
                    'body' => 'string',
                    'category_id' => 'exists:categories,id',
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'body' => '话题内容',
            'category_id' => '分类',
        ];
    }
}
