<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomizationGroup extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customization_groups';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'name',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_customization_groups');
    }

    public function customizations()
    {
        return $this->belongsToMany('App\Customization', 'c12lens_groups_c12lens');
    }
}