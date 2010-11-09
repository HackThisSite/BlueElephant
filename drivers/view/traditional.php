<?php
class traditional_view_driver
{
	public function parse($view, $data)
	{
        // Save the current output buffer to restore it later.
		$saved = ob_get_clean();
		
		// localize all the view variables.
        extract($data);
		
		// Start capturing a new output buffer, load the view
		// and apply all the display logic to the localized data
		// and save the results in $parsed.
		ob_start();
		require $view;
		$parsed = ob_get_clean();
		
		// Restore the output buffer to it's previous state.
		ob_start();
		echo $saved;
		
		return $parsed;
	}
}
