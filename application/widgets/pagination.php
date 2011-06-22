<?php 
/**
* Variables this widget accepts are as follows:
*  + $base_url (required)
*    - the base url for pagination
*  + $total_rows (required)
*    - The total ammount of items to paginate
*  + $per_page (required)
*    - The amount of items per page to paginate
*  + $current_page (required)
*    - The current page to calculate pagination
*  + $open_tag (optional)
*    - The opening tag to begin the pagination
*    - Defaults to <div class="$pagination_class">
*  + $close_tag (optional)
*    - The closing tag to end the pagination
*    _ Defaults to </div>
*  + $pagination_class (optional)
*    - The css class to use for the default open_tag
*    - Only works when $open_tag is not set
*    - Defaults to 'pagination'
*  + $first_open_tag (optional)
*    - The tag that will begin the first link
*    - Defaults to '<div>'
*  + $first_link (optional)
*    - The text that will go inside of the first link
*    - Defaults to '&laquo; First'
*  + $first_close_tag (optional)
*    - The tag that will end the first link
*    - Defaults to '</div>'
*  + $num_links (optional)
*    - The number of links before and after the current page
*    - Total number of links displayed will be 
*      $numlinks * 2 + 1 always.
*    - Defualts to 2
*  + $digit_open_tag (optional)
*    - The tag that will begin each digit link
*    - Defaults to '<div>'
*  + $digit_close_tag (optional)
*    - The tag that will close each digit link
*    - Defaults to '</div>'
*  + $digit_current_open (optional)
*    - The tag that will begin the current digit
*    - Defaults to '<b>'
*  + $digit_current_close (optional)
*    - The tag that will end the current digit
*    - Defaults to </b>
*/
?>
<?php if ($open_tag): ?>
 <?php echo $open_tag; ?>
<?php else: ?>
 <div class="<?php echo ($pagination_class) ? $tag_class : 'pagination'; ?>">
<?php endif; ?>
<?php if ($base_url): ?>
 <?php if ($total_rows): ?>
  <?php if ($per_page): ?>
   <?php if ($current_page): ?>
    <?php echo ($first_open_tag) ? $first_open_tag : '<div>'; ?>
    <a href="<?php echo $base_url; ?>/0"> <!-- TODO: customize the digit paramaterization -->
     <?php echo ($first_link) ? $first_link : '&laquo; First'; ?>
    </a>
    <?php echo ($first_close_tag) ? $first_close_tag : '</div>'; ?>
    <?php 
        ////
        // Logic for determining page start and end counts based on configs
        ///
        if (!is_int($num_links) || !$num_links) $num_links = 2;
        $total_pages = ceil($total_rows / $per_page);
        
        // If current page is less then half the number of links to display
        // then adjust starting/ending position accordingly
        if (--$current_page <= $num_links)
        {
            $start_page = 0;
            
            // If the end page is less then the number of links to display
            // per $num_links adjust $num_links
            if ($total_pages < $num_links * 2)
            {
                $num_links = floor($total_pages / 2);
            }
        }
        else
        {
            // If current page is greater then total pages - numlinks then
            // calculate the start position from the end.
            if ($current_page + $num_links >= $total_pages)
            {
                $start_page = $total_pages - ($num_links * 2 + 1);
            }
            else
            {
                // If position greater then $num_links then calculate start
                // page
                $start_page = $current_page - $num_links;
            }
        }
        
        // Calculate the end page based on the start page + number of links
        $end_page = $start_page + $num_links * 2 + 1;
        
        //set default tags
        if (!$digit_open_tag) $digit_open_tag = '<div>';
        if (!$digit_close_tag) $digit_close_tag = '</div>';
        if (!$digit_current_open) $digit_current_open = '<div><b>';
        if (!$digit_current_close) $digit_current_close = '</b></div>';
        
        // adjust $current_page for a good visual
        //$current_page--;
    ?>
    <?php for ($i = $start_page; $i < $end_page; $i++): ?>
     <?php echo ($i != $current_page) ? $digit_open_tag : $digit_current_open; ?>
     <a href="<?php echo $base_url; ?>/<?php echo $i; ?>"><?php echo $i + 1; ?></a>
     <?php echo ($i != $current_page) ? $digit_close_tag : $digit_current_close; ?>
    <?php endfor; ?>
    <a href="<?php echo $base_url; ?>/<?php echo --$total_pages; ?>"> <!-- TODO: customize the digit paramaterization -->
     <?php echo ($last_link) ? $first_link : 'Last &raquo;'; ?>
    </a>
   <?php else: ?>
    Missing widget parameter: current_page
   <?php endif; ?>
  <?php else: ?>
   Missing widget parameter: per_page
  <?php endif; ?>
 <?php else: ?>
  Missing widget parameter: total_rows
 <?php endif; ?>
<?php else: ?>
 Missing widget parameter: base_url
<?php endif; ?>
<?php if ($close_tag): ?>
 <?php echo $close_tag; ?>
<?php else: ?>
 </div>
<?php endif; ?>