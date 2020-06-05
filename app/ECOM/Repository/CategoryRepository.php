<?php

namespace App\ECOM\Repository;


use Illuminate\Pagination\Paginator;
use \App\Models\Category;

class CategoryRepository
{

    public function listOfCategories($currentPage = 1, $perPage = 10)
    {
        // Items per page
        if ($perPage > 50) {
            $perPage = 10;
        }

        // Get current items calculated with per page and current page
        $categories = Category::withCount('items')->orderBy('items_count', 'desc')
            ->offset($perPage * ($currentPage - 1))
            ->limit($perPage)
            ->get();

        // Create paginator
        $paginator = new Paginator($categories, 10, $currentPage);

        return $paginator;
    }

    public function getRootParentList()
    {
        $parentCategories = \App\Models\CategoryRelation::groupBy('ParentcategoryId')->get();
        $parentCategoriesIdList = $parentCategories->pluck('ParentcategoryId')->toArray();
        $parentsForExclude = \App\Models\CategoryRelation::whereIn('categoryId', $parentCategoriesIdList)->pluck('categoryId')->toArray();

        $rootParentsId = array_diff($parentCategoriesIdList, $parentsForExclude);
        $rootParents = \App\Models\Category::with('childrenCategories')->whereIn('Id', $rootParentsId)->get();

        return $rootParents;
    }
}
