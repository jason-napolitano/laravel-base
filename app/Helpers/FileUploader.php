<?php

namespace App\Helpers;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

/**
 * The file upload helper makes it easier to upload files
 * to the file server
 *
 * @package App\Helpers
 * ----------------------------------------------------------------
 * CONTROLLER USAGE:
 *  $fields = $request->validate([
 *      'file_url' => 'string|nullable'
 *  ]);
 *
 *  if (isset($fields['file_url'])) {
 *      \App\Helpers\FileUploader::upload($fields['file_url']);
 *  }
 */
class FileUploader
{
	/**
	 * Save image in local file system and return saved image path
	 *
	 * @param string $image      The physical file itself
	 * @param string $dir        The directory to upload into
	 * @param array  $extensions An array of file extensions
	 *
	 * @return string
	 */
	public static function upload(
		string $image,
		string $dir = 'uploads',
		array $extensions = ['jpg', 'jpeg', 'gif', 'png']
	): string {
		// Check if image is valid base64 string
		if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
			// Take out the base64 encoded text without mime type
			$image = substr($image, strpos($image, ',') + 1);
			// Get file extension
			$type = strtolower($type[1]); // jpg, png, gif
			
			// Check if file is an image
			if (!in_array($type, $extensions, true)) {
				throw new RuntimeException('invalid image type');
			}
			$image = str_replace(' ', '+', $image);
			$image = base64_decode($image);
			
			if ($image === false) {
				throw new RuntimeException('base64_decode failed');
			}
		} else {
			throw new RuntimeException('did not match data URI with image data');
		}
		
		$dir = "$dir/";
		$file = Str::random() . '.' . $type;
		$absolutePath = public_path($dir);
		$relativePath = $dir . $file;
		if (!File::exists($absolutePath)) {
			File::makeDirectory($absolutePath, 0755, true);
		}
		file_put_contents($relativePath, $image);
		
		return $relativePath;
	}
}