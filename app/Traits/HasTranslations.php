<?php 
namespace App\Traits;

use App;

trait HasTranslations {

	public function translate($translatableField)
    {
    	if(!$this->translatableFields)
    		abort(500, 'You must declare the translatableFields in your model.');

    	if(!in_array($translatableField, $this->translatableFields))
    		return null;

    	return $this->attributes[$translatableField.'_'.App::getLocale()];
    }
}