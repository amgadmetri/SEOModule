<?php namespace App\Modules\Seo;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model {

	/**
	 * Spescify the storage table.
	 * 
	 * @var table
	 */
	protected $table    = 'seo';

	/**
	 * Specify the fields allowed for the mass assignment.
	 * 
	 * @var fillable
	 */
	protected $fillable = ['title', 'keywords', 'description', 'author', 'item_type', 'item_id', 'user_id'];

	/**
	 * Get the SEO.
	 * 
	 * @return object
	 */
	public function seo()
	{
		return $this->belongsTo('App\Modules\Seo\Seo', 'item_id');
	}

	public static function boot()
	{
		parent::boot();

		/**
		 * Remove the SEO related to 
		 * the deleted item type.
		 */
		Seo::deleting(function($seo)
		{
			$seo->seo()->delete();
		});
	}
}
