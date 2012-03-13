<html>
 <head>
  <title>Blue Elephant</title>
  <link rel="stylesheet" href="application/style/style.css" type="text/css" />
 </head>
 <body>
  <div id="content"> 
   <p align="right"> 
    Blue Elephant Framework
   </p>
     <?php echo $page_content; ?>
   <p>
   Page loaded in <?php echo Layout::get("pageExecutionTime"); ?> seconds.
   </p>
  </div> 
 </body>
</html>
