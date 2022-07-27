<?php 

function createCategoryTree(array &$items) {

    $childs = [];

    foreach ($items as &$item) {
        $childs[$item['parent_id']][] = &$item;    
       
    }
    unset($item);

    foreach ($items as &$item) {

        if (isset($childs[$item['id']])) {
            $item['sub_categories'] = $childs[$item['id']];
        }
    }

    return $childs[0] ?? [];
}


function get_last_subcategory_array(array &$arr)
{
  
    foreach($arr as $key => $val)
    {
        if(isset($val['sub_categories']))
        {
            get_last_subcategory_array($val['sub_categories']);
        }else{
            return $arr;
        }
    }

}

function getDisableCategoryIDs(array $categoryTree){

    $disable_categories = []; 

    foreach($categoryTree as $key => $category){
        $last_subcategory_array=[];
    
        if(isset($category['sub_categories']))
        {
            
            $last_subcategory_array=get_last_subcategory_array($category['sub_categories']);
    
            //Temporary Array to store IDs to be deleted
            $temp = [];
    
            foreach($last_subcategory_array as $last_subcategory)
            {
              
                if($last_subcategory['active_products'] == 0)
                {
                    $temp[] = $last_subcategory['id'];
                }
                
            }
    
            if(!empty($temp)) {
                if(count($last_subcategory_array ) == count($temp))
                {
                    $result = [];
                    array_walk_recursive($category, function($v, $k) use(&$result) {
                        if ($k =='id') {
                            $result[] = $v;
                        }
                    });
    
                    $disable_categories[] = $result;
                }else{
            
                    $disable_categories[] = &$temp;
                }
            }
    
            unset($temp);
    
    
        }else{
            if($category['active_products'] == 0)
            {
                $disable_categories[] = $category['id'];
            }
        }
    }

    return array_merge(...$disable_categories);
}
