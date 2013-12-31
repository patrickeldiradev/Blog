<?php

namespace App\Http\Requests\Dashboard\Posts;

use App\DTO\PostTransfer;
use App\Mapper\PostMapper;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:20|max:100000',
            'publication_date' => 'sometimes|date|after_or_equal:now',
        ];
    }

    /**
     * @return PostTransfer
     */
    public function getRequestDataTransfer(): PostTransfer
    {
        $postMapper = new PostMapper([
            'title' => $this->input('title'),
            'description' => $this->input('description'),
            'publication_date' => $this->input('publication_date'),
            'user' => [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'type' => auth()->user()->type,
            ],
        ]);

        return $postMapper->mapToTransfer();
    }
}
