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
     * A product belongs to a single user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A product can be used on many menus, and a menu can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'menus_products');
    }


    /**
     * A product can have many customization groups assigned to it, and a customization group can be assigned to many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customizationGroups()
    {
        return $this->belongsToMany('App\CustomizationGroup', 'products_customization_groups');
    }
}