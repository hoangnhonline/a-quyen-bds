<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ArticlesCate;
use App\Models\Settings;
use App\Models\Text;
use Auth;
use Request;
//use App\Models\Entity\SuperStar\Account\Traits\Behavior\SS_Shortcut_Icon;

class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{
		$cateArrByLoai = [];		
		view()->composer( '*' , function( $view ){			
			
	        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
	        $textList = Text::whereRaw('1')->lists('content', 'id');
	        $routeName = \Request::route()->getName();
	        
	        $isEdit = Auth::check();	        

			$view->with( [					
					'settingArr' => $settingArr,					
					'routeName' => $routeName,					
					'textList' => $textList,
					'isEdit' => $isEdit					
					] );
		});
	}
	
}
