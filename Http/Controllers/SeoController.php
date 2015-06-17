<?php namespace App\Modules\Seo\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Modules\Seo\Http\Requests\SeoFormRequest;
use Illuminate\Http\Request;

class SeoController extends BaseController {

	/**
	 * Specify a list of extra permissions.
	 * 
	 * @var permissions
	 */
	protected $permissions = [
	'getShow'      => 'show', 
	];

	/**
	 * Create new SeoController instance.
	 */
	public function __construct()
	{
		parent::__construct('Seo');
	}

	/**
 	 * Display a listing of SEO.
 	 * 
 	 * @return response
 	 */
	public function getShow($itemType, $item_id)
	{
		$seos =\CMS::seo()->getAllSeo($itemType, $item_id);
		return view('seo::seo.seo', compact('seos','itemType','item_id'));
	}


	/**
	 * Show the form for creating a new Seo.
	 * 
	 * @return Response
	 */
	
	public function getCreate($itemType, $item_id)
	{
		return view('seo::seo.createseo', compact('itemType','item_id'));
	}

	/**
	 * Add a newly SEO in database.
	 * 
	 * @param  SeoFormRequest  $request
	 * @return Response
	 */
	public function postCreate(SeoFormRequest $request, $itemType, $item_id)
	{
		$data['user_id']      = \Auth::user()->id;
		$data['item_type']    = $itemType;
		$data['item_id']      = $item_id;
		\CMS::seo()->create(array_merge($request->except('user_id', 'item_id', 'item_type'), $data));

		return redirect()->back()->with('message', 'SEO successfully added');
	}

	/**
	 * Show the form for editing the specified SEO.
	 * 
	 * @param  integer $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$seodata   = \CMS::seo()->find($id);
		return view('seo::seo.editseo', compact('seodata'));
	}

	/**
	 * Update the specified SEO in storage.
	 * 
	 * @param  integer         $id
	 * @param  SeoFormRequest  $request
	 * @return Response
	 */
	public function postEdit(SeoFormRequest $request, $id)
	{
		$data['user_id']      = \Auth::user()->id;
		$data['item_type']    = "content";
		$data['item_id']      = 2;	
		\CMS::seo()->update($id, array_merge($request->except('user_id', 'item_id', 'item_type'), $data));

		return redirect()->back()->with('message', 'SEO successfully updated');
	}

	/**
	 * Remove the specified SEO from storage.
	 * 
	 * @param  integer  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		\CMS::seo()->delete($id);
		return redirect()->back()->with('message', 'SEO Deleted succssefully');
	}
	
	/**
	 * Show the form for editing the specified SEO.
	 * 
	 * @param  integer $id
	 * @return Response
	 */
	public function getSeoshow($id)
	{
		$seodata   = \CMS::seo()->find($id);
		return view('seo::seo.viewseo', compact('seodata'));
	}

	
}
