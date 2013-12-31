<?php

namespace App\Http\Requests\Dashboard\Posts;

use App\DTO\PostTransfer;
use App\DTO\UserTransfer;
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
        $postTransfer = new PostTransfer();
        $postTransfer->setTitle($this->input('title'));
        $postTransfer->setDescription($this->input('description'));
        $postTransfer->setPublicationDate($this->input('publication_date'));
        $postTransfer->setUserTransfer($this->createUserTransfer());

        return $postTransfer;
    }

    /**
     * @return UserTransfer
     */
    protected function createUserTransfer(): UserTransfer
    {
        $userTransfer = new UserTransfer();
        $userTransfer->setId(auth()->user()->id);
        $userTransfer->setName(auth()->user()->name);
        $userTransfer->setEmail(auth()->user()->email);
        $userTransfer->setType(auth()->user()->getType());

        return $userTransfer;
    }
}
