<?php namespace App\Modules\Seo\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Modules\Seo\Http\Requests\SeoFormRequest;

class SeoController extends BaseController {

	/**
	 * Specify a list of extra permissions.
	 * 
	 * @var permissions
	 */
	protected $permissions = [
	'getShow' => 'show', 
	];

	/**
	 * Create new SeoController instance.
	 */
	public function __construct()
	{
		parent::__construct('Seos');
	}

	/**
 	 * Display a listing of SEO.
 	 * 
 	 * @return response
 	 */
	public function getShow($itemType, $item_id)
	{
		$seo = \CMS::seo()->getSeo($itemType, $item_id);
		return view('seo::seo.saveseo', compact('seo','itemType','item_id'));
	}

	/**
	 * Add a newly SEO in database.
	 * 
	 * @param  SeoFormRequest  $request
	 * @return Response
	 */
	public function postShow(SeoFormRequest $request, $itemType, $item_id)
	{
		$data['user_id']   = \Auth::user()->id;
		$data['item_type'] = $itemType;
		$data['item_id']   = $item_id;
		\CMS::seo()->saveSeo(array_merge($request->all(), $data), $itemType, $item_id);

		return redirect()->back()->with('message', 'SEO successfully added');
	}		
}
