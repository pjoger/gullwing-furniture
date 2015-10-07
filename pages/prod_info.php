<?php

function switch_prod_info ($prod){
  if ($prod){
    // ничего не надо делать
  } else if(!isset($_GET['prod'])){
    $prod = 'table1';
  } else {
    $prod = addslashes(strip_tags(trim($_GET['prod'])));
  }
  global $prod_info;
  switch ($prod){
    case 'table2':
      $prod_info = array(
        'prefix'					=> 'table2_',
        'title'						=> 'Table2_Name',
        'descr'						=> 'Table2_Description',
        'head_descr'      => 'Table2_HeaderDescr',
        'head_keywords'   => 'Table2_HeaderKeywords',
        'files_template'	=> '/photos/table_2%02d.jpg',
        'thumb_template'	=> '/photos/table_2%02d_64.jpg',
        'files_amount'		=> 3,
      );
    break;
    case 'table3':
      $prod_info = array(
        'prefix'					=> 'table3_',
        'title'						=> 'Table3_Name',
        'descr'						=> 'Table3_Description',
        'head_descr'      => 'Table3_HeaderDescr',
        'head_keywords'   => 'Table3_HeaderKeywords',
        'files_template'	=> '/photos/table_3%02d.jpg',
        'thumb_template'	=> '/photos/table_3%02d_64.jpg',
        'files_amount'		=> 4,
      );
    break;
    default:
      $prod = 'table1';
      $prod_info = array(
        'prefix'					=> 'table1_',
        'title'						=> 'Table1_Name',
        'descr'						=> 'Table1_Description',
        'head_descr'      => 'Table1_HeaderDescr',
        'head_keywords'   => 'Table1_HeaderKeywords',
        'files_template'	=> '/photos/table_1%02d.jpg',
        'thumb_template'	=> '/photos/table_1%02d_64.jpg',
        'files_amount'		=> 2,
      );
  }
}

?>


