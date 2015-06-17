<?php namespace App\Modules\Seo\Repositories;

use App\AbstractRepositories\AbstractRepository;

class SeoRepository extends AbstractRepository
{
	/**
	 * Return the model full namespace.
	 * 
	 * @return string
	 */
	protected function getModel()
	{
		return 'App\Modules\Seo\Seo';
	}
	
	/**
	 * Return the module relations.
	 * 
	 * @return array
	 */
	protected function getRelations()
	{
		return ['seo'];
	}
	
	/**
	 * Return All SEO belongs to specific
	 * item type.
	 * 
	 * @param  string  $itemType
	 * @param  integer $itemId
	 * @return collection
	 */
	public function getAllSeo($itemType, $itemId)
	{
		return  $this->model->with($this->getRelations())->
		                     whereRaw('item_id=? and item_type=?', [$itemId, $itemType])->
		                     get();
	}

	/**
	 * Return the SEO  based on the given item type
	 * 
	 * @param  string $itemType
	 * @return string
	 */
	
	public function renderSeoByType($itemType)
	{
		$seo         = $this->first('item_type',$itemType);
		$html        = '';
		$defaultPath ="seo::seo.seohtml";
		$html       .= view($defaultPath, compact('seo'))->render();
		return $html;
	}

	/**
	 * Return the SEO  based on the given item id
	 * 
	 * @param  string $itemType
	 * @return string
	 */
	
	public function renderSeoById($id)
	{
		$seo         = $this->find($id);
		$html        = '';
		$defaultPath ="seo::seo.seohtml";
		$html       .= view($defaultPath, compact('seo'))->render();
		return $html;
	}

}
