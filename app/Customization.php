<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customization extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customizations';

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
     * A Customization belongs to exactly one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * A Customization can belong to many Customization Groups, and a Customization Group has many Customizations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customizationGroups()
    {
        return $this->belongsToMany('App\CustomizationGroup', 'c12lens_groups_c12lens');
    }
}