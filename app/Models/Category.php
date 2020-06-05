<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    protected $table = 'category';
    protected $primaryKey = 'Id';

    public function items()
    {
        return $this->belongsToMany(Item::class, 'Item_category_relations', 'categoryId', 'ItemNumber');
    }

    public function child()
    {
        return $this->belongsToMany(Category::class, 'catetory_relations', 'ParentcategoryId', 'categoryId');
    }

    public function childrenCategories()
    {
        return $this->belongsToMany(Category::class, 'catetory_relations', 'ParentcategoryId', 'categoryId')->with('child');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'catetory_relations', 'categoryId', 'Id');
    }

    /*public function itemsCount()
    {
        return $this->belongsToMany(Item::class, 'Item_category_relations', 'categoryId', 'ItemNumber')
            ->selectRaw('count(Items.Id) as aggregate')
            ->groupBy('pivot_items_id');
    }

    public function getItemsCountAttribute()
    {
        if ( ! array_key_exists('itemsCount', $this->relations)) $this->load('itemsCount');

        return $this->getRelation('itemsCount')->aggregate;
    }*/
}
