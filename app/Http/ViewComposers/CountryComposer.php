<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use Request;
use PragmaRX\Countries\Package\Countries;
use Stevebauman\Location\Facades\Location;

class CountryComposer
{
    public function _construct()
    {
    }
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */

    public function compose(View $view)
    {
        // $ip = Request::ip();
        // $position = Location::get($ip);
        // $flag = Countries::where('cca2',$position->countryCode)->first();
        // $flag_path = basename($flag->flag->svg_path);
        $view->with('flag', 'pak.svg');
    }
 }
