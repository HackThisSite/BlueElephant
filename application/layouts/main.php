<html>
 <head>
  <title>Blue Elephant</title>
 </head>
 <body>
  <?php echo $page_content; ?><br />
  <br />
  Page loaded in <?php echo round($GLOBALS['globalPageTimer']->__toString(), 3); ?> seconds.
 </body>
</html>
