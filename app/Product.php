<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

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

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'menus_products');
    }

    public function customizationGroups()
    {
        return $this->belongsToMany('App\CustomizationGroup', 'products_customization_groups');
    }
}