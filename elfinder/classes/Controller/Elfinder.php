<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Elfinder extends Controller {

	public function action_index()
	{
		$elFinder = kelFinder::factory(Request::current()->param('config'));
		ob_start();
		$elFinder->run();
		$elFinder_output = ob_get_contents();
		ob_end_clean();

		$this->response->body($elFinder_output);
	}

	public function action_media()
	{
		$response = $this->response;
		// Get the file path from the request
		$file = $this->request->param('file');

		// Find the file extension
		$ext = pathinfo($file, PATHINFO_EXTENSION);

		// Remove the extension from the filename
		$file = substr($file, 0, -(strlen($ext) + 1));

		$file = Kohana::find_file('media', $file, $ext);
		if($file)
		{
			// Check if the browser sent an "if-none-match: <etag>" header, and tell if the file hasn't changed
			HTTP::check_cache(Request::current(),$response,sha1(Request::current()->uri()).filemtime($file));

			// Send the file content as the response
			$response->body(file_get_contents($file));
		}
		else
		{
			// Return a 404 status
			$response->status(404);
		}
		// Set the proper headers to allow caching
		$this->response->headers('Content-Type', File::mime_by_ext($ext));
		
	}



}

?>