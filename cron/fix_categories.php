<?php

require('../includes/configure.php');
ini_set('include_path', DIR_FS_CATALOG . PATH_SEPARATOR . ini_get('include_path'));
chdir(DIR_FS_CATALOG);
require_once('includes/application_top.php');
include('cron/functions.php');

global $db;

$table_categories = TABLE_CATEGORIES;
$table_product_categories = TABLE_PRODUCTS_TO_CATEGORIES;
$table_products = TABLE_PRODUCTS;

//Get All Category 
$sql = "SELECT 
cat.categories_id as id,
cat.parent_id,
COUNT(p.products_id) as active_products
FROM
{$table_categories} cat
    LEFT JOIN
{$table_product_categories} ptc ON ptc.categories_id = cat.categories_id
    LEFT JOIN
{$table_products}  p ON p.products_id = ptc.products_id  AND p.products_status = 1
GROUP BY  cat.categories_id , cat.parent_id
ORDER BY cat.parent_id,cat.categories_id";

$query = $db->Execute($sql);

$categories = [];

while (!$query->EOF) {

    $parent_id = $query->fields['parent_id'];
    $category_id = $query->fields['id'];
    $active_products = $query->fields['active_products'];

    $categories[$category_id] = [
        'total' => $active_products,
        'parent_id' => $parent_id,
    ];

    if ( $active_products> 0 && $parent_id != 0) {
        updateParentCount($categories, $parent_id, $active_products);
    }

    $query->MoveNext();
}

$filter = array_filter($categories, function ($category) {
    return $category['total'] == 0;
});

$category_ids_to_disable = array_keys($filter);


$update_sql = sprintf("UPDATE {$table_categories}  SET categories_status=%s WHERE categories_id IN  ('%s')", 0, implode("','", $category_ids_to_disable));
$update_query = $db->Execute($update_sql);
