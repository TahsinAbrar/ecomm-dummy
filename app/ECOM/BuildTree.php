<?php


namespace App\ECOM;


class BuildTree
{
    public function buildTree($category)
    {

        echo '<li>';

        echo '<a href="#">' .$category->Name . '(' . $category->itemCount() .') </a>'; /* TODO: Need to make the count recursive */

        if ($category->childrenCategories->count()) {
            echo '<ul>';
            foreach ($category->childrenCategories as $child) {
                $this->buildTree($child);
                echo '</li>';
            }

            echo '</ul>';
        }

        echo '</li>';
    }
}
