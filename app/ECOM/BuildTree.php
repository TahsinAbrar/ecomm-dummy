<?php


namespace App\ECOM;


class BuildTree
{
    private $totalItemsCount = 0;

    public function buildTree($category)
    {

        echo '<li>';

        $this->totalItemsCount += $category->items->count();

        echo '<a href="#">' .$category->Name . '(' . $category->items->count() .') </a>'; /* TODO: Need to make the count recursive */

        if ($category->childrenCategories->count()) {
            echo '<ul>';
            foreach ($category->childrenCategories as $child) {
                $this->totalItemsCount += $child->items->count();

                echo '<li>' . $child->Name . ' ('. $child->items->count() .')';
                $this->buildTree($child, $this->totalItemsCount);
                echo '</li>';
            }

            echo '<strong>Total Item Count (' . $this->totalItemsCount . ')</strong></ul>'; /* Need testing, exactly couldn't able to verify it properly while submitting it. */
//            echo '</ul>';
        }

        echo '</li>';
    }
}
