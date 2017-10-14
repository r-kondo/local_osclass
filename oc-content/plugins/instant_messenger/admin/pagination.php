<?php
function im_add_pagination($total, $list, $file) {

  $num_spam = $total;
  $num_list = $list;

  // Figure out what rows we want, and SELECT them
  if (Params::getParam('start')) {
    $start = intval(Params::getParam('start'));
    if ($start > 0) {
      $start--;
    }
  } else {
    $start = 0;
  }

  // Pagination
  $multiple_pages_p     = '';
  $multiple_pages_links = '';
  $multiple_pages_n  = '';
  $dots_after           = '';
  $dots_after           = '';

  $pagination_rows = $num_spam;
  if ($start < $num_list) { $page = "0"; } else { $page = $start / $num_list; }

  $page_count = ceil($pagination_rows/$num_list);

  if ($page_count > 1) {
    if (($page + 1) > 1) {
      $previous_page = (($page - 1) * $num_list) + 1;		
      // Previous Page			
      if($previous_page > 1) {
        $multiple_pages_p .= ' <a href="' . osc_base_url() . 'oc-admin/index.php?page=plugins&action=renderplugin&file=' . $file . '&start='.$previous_page.'">&lt;</a> ';
      } else {
        $multiple_pages_p .= ' <a href="' . osc_base_url() . 'oc-admin/index.php?page=plugins&action=renderplugin&file=' . $file . '">&lt;</a> ';
      }				
    }

    for ($page_number = 1; $page_number <= $page_count; $page_number++) {
      $start_page = (($page_number - 1) * $num_list) + 1;
      if (($page_number - 1) == $page) {
        // Current Page
        $multiple_pages_links .= ' <span>'.$page_number.'</span> ';				
      } else {
        if($page_number >= $page_count - 10) { $minus_pages = 9; } else { $minus_pages = 3; }				 		
        if ($page_number <= 11 && $page_number >= $page - 3 || $page_number >= $page - $minus_pages && $page_number <= $page + 5 || $page_number == 1 || $page_number == $page_count) {
          // Other Pages			
          $multiple_pages_links .= ' <a href="' . osc_base_url() . 'oc-admin/index.php?page=plugins&action=renderplugin&file=' . $file . '&start='.$start_page.'">'. $page_number .'</a> ';
        } else {				
          if ($page_number > $page && $dots_after != true) {
            $multiple_pages_links .= ' ...';
            $dots_after = true;
          } elseif ($page_number < $page && $dots_before != true) {
            $multiple_pages_links .= ' ...';
            $dots_before = true;
          }
        }
      }
    }
    if (($page + 1) < $page_count) {
      $next_page = (($page+1) * $num_list) + 1;
      // Next Page
      $multiple_pages_n .= ' <a href="' . osc_base_url() . 'oc-admin/index.php?page=plugins&action=renderplugin&file=' . $file . '&start='.$next_page.'">&gt;</a> ';
    }
  }

  //Return pagination
  $result = $multiple_pages_p . $multiple_pages_links . $multiple_pages_n;
  return $result;
}
