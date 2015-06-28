<?php namespace App\Modules\Seo\Repositories;

use App\Modules\Core\AbstractRepositories\AbstractRepository;

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
		return [];
	}
	
	/**
	 * Return SEO belongs to specific
	 * item type.
	 * 
	 * @param  string  $itemType
	 * @param  integer $itemId
	 * @return collection
	 */
	public function getSeo($itemType, $itemId, $language = false)
	{
		$seo = $this->model->with($this->getRelations())->
		                     whereRaw('item_id=? and item_type=?', [$itemId, $itemType])->
		                     first();
		if ( ! $seo) return false;

		return $this->getSeoTranslations($seo, $language);
	}

	/**
	 * Return the seo translated data based on the 
	 * given language.
	 * 
	 * @param  object $obj
	 * @param  string $language
	 * @return object 
	 */
	public function getSeoTranslations($obj, $language)
	{
		$obj->data = \CMS::languageContents()->getTranslations($obj->id, 'seo', $language);
		return $obj;
	}
	
	/**
	 * Create or update the given seo
	 * for specified item type and item id.
	 * 
	 * @param  array   $data
	 * @param  string  $itemType    The name of the item belongs to
	 *                              the seo. 
	 *                              ex: 'user', 'content' ....
	 * @param  integer $itemId      The id of the item belongs to
	 *                              the seo.
	 *                              ex: 'user', 'content' ....
	 * @return void
	 */
	public function saveSeo($data, $itemType, $itemId)
	{
		$seo          = $this->model->firstOrNew(['item_type' => $itemType, 'item_id' => $itemId]);
		$seo->user_id = $data['user_id'];
		$seo->save();

		\CMS::languageContents()->insertLanguageContent([
				'title'       => $data['title'],
				'keywords'    => $data['keywords'],
				'author'      => $data['author'],
				'description' => $data['description'],
				], 'seo', $seo->id);
	}
}
