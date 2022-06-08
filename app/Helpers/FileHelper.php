<?php

namespace App\Helpers;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

/**
 * The file helper makes it easier to upload/remove files to/from 
 * the file server
 * ----------------------------------------------------------------
 * CONTROLLER USAGE:
 *
 * use App\Helpers\FileHelper;
 *
 *  $fields = $request->validate([
 *      'file_url' => 'string|nullable'
 *  ]);
 *
 *  if (isset($fields['file_url'])) {
 *      FileHelper::upload($fields['file_url']);
 *  }
 */
class FileHelper
{
	/**
	 * Save a file to the local file system and return saved file
     * path
	 *
	 * @param string $image      The physical file itself
	 * @param string $dir        The directory to upload to
	 * @param array  $extensions An array of accepted MIME types
	 *
	 * @return string
	 */
	public static function upload(string $image, string $dir = 'uploads', array $extensions = ['jpg', 'jpeg', 'gif', 'png']): string 
    {
		// Check if the image is valid base64 string
		if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            
			// Take out the base64 encoded text without mime type
			$image = substr($image, strpos($image, ',') + 1);
            
			// Get file extension
			$type = strtolower($type[1]); // jpg, png, gif
			
			// Check if file is a valid MIME type
			if (!in_array($type, $extensions, true)) {
				throw new RuntimeException('invalid image type');
			}
			$image = str_replace(' ', '+', $image);
			$image = base64_decode($image);
			
            // If the base64 decoding fails
			if ($image === false) {
				throw new RuntimeException('base64_decode failed');
			}
		} else {
			throw new RuntimeException('did not match data URI with image data');
		}
		
        // If everything looks okay, and passes validation, process the file
		$dir = "$dir/";
		$file = Str::random() . '.' . $type;
		$absolutePath = public_path($dir);
		$relativePath = $dir . $file;
        
        // If the directory does !not exist
		if (!File::exists($absolutePath)) {
            // Create the directory
			File::makeDirectory($absolutePath, 0755, true);
		}
        
        // Upload the file to the local file system
		file_put_contents($relativePath, $image);
		
        // Return the file location
		return $relativePath;
	}
    
    /**
     * Soft delete a local file from the file system
     */
    public function soft_delete()
    {
        // Under construction ...   
    }
    
    /**
     * Delete a file local from the file system
     */
    public function delete()
    {
        // Under construction ...   
    }
}
