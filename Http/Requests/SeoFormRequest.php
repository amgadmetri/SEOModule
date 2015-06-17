<?php
namespace App\Modules\Seo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoFormRequest extends FormRequest
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
			'title'       => 'required|max:70',
			'keywords'    => 'required|max:255',
			'author'      => 'required|max:70',
			'description' => 'required|max:160'
		];
	}
}