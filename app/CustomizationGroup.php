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
     * A Customization Group belongs to exactly one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * A product can have many Customization Groups, and a Customization Group can be on many Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_customization_groups');
    }


    /**
     * A Customization Group can have many Customizations, and Customizations can be in many Customization Groups
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customizations()
    {
        return $this->belongsToMany('App\Customization', 'c12lens_groups_c12lens');
    }
}