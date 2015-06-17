<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoPermission extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		foreach (\CMS::coreModuleParts()->getModuleParts('seo') as $modulePart) 
		{
			if ($modulePart->part_key == 'Seos') 
			{
				\CMS::permissions()->insertDefaultItemPermissions(
				                 $modulePart->part_key, 
				                 $modulePart->id, 
				                 [
					                 'admin'   => ['show', 'add', 'edit', 'delete'],
					                 'manager' => ['show', 'add', 'edit', 'delete']
				                 ]);
			}
		} 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		foreach (\CMS::coreModuleParts()->getModuleParts('seo') as $modulePart) 
		{
			\CMS::deleteItemPermissions($modulePart->part_key);
		}
	}
}