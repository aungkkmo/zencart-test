<?php 



function updateParentCount(&$categories, $parentId, $count) {
    $categories[$parentId]['total'] += $count;
    if ($categories[$parentId]['parent_id']) {
        updateParentCount($categories, $categories[$parentId]['parent_id'], $count);
    }
}
