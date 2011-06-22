<h1>Performance With Quality</h1> 
<p>
 Hello <?php echo $world; ?>!!!!
</p> 
<pre> 
<?php echo new Widget('elephant') ?>
</pre>
<h2>Pagination demo</h2>
<?php for($i = 0; $i < 21; $i++): ?>
 <?php echo new Widget('pagination', array('base_url' => 'wat', 'total_rows' => 100, 'per_page' => 5, 'current_page' => $i)); ?><br />
<?php endfor; ?>