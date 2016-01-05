<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 1/2/16
 * Time: 4:55 PM
 */

namespace Erp\Http\Controllers\Language;


trait Lang
{

    public function chosenLanguage()
    {
        if(session()->get('locale')){
            $locale = session()->get('locale');
        }else{
            $locale = config('app.fallback_locale');
        }
        return $locale;
    }

}