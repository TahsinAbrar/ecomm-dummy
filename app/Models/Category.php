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

    public function itemCount()
    {
        $sum = 0;

        foreach ($this->childrenCategories as $child) {
            $sum += $child->itemCount();
        }

        return $this->items->count() + $sum;
    }

    public function child()
    {
        return $this->belongsToMany(Category::class, 'catetory_relations', 'ParentcategoryId', 'categoryId');
    }

    public function childrenCategories()
    {
        return $this->belongsToMany(Category::class, 'catetory_relations', 'ParentcategoryId', 'categoryId')->with('child');
    }
}
