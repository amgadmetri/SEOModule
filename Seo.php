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
	protected $fillable = ['item_type', 'item_id', 'user_id'];
}
