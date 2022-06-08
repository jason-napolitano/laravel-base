<?php namespace App\Helpers {
    // Imports --------------------------------------------------------
    use RuntimeException;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\File;

    /**
     * The file helper makes it easier to upload/remove images to/from 
     * the file server
     * 
     * @package App\Helpers
     * @author  Jason Napolitano
     @ version  1.0.0
     * ----------------------------------------------------------------
     * EXAMPLE CONTROLLER USAGE:
     *
     * use App\Helpers\FileHelper;
     *
     * fields = $request->validate([
     *   'file_url' => 'string|nullable'
     * ]);
     *
     *  if (isset($fields['file_url'])) {
     *    FileHelper::upload($fields['file_url']);
     *  }
     */
    class FileHelper
    {
        /**
         * Save an image to the local file system and return saved file
         * path
         *
         * @param string $image      The physical image itself
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
                    throw new RuntimeException('Invalid MIME Type');
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

            // If everything looks okay, and passes validation, process the image
            $dir = "$dir/";
            $file = Str::random() . '.' . $type;
            $absolutePath = public_path($dir);
            $relativePath = $dir . $file;

            // If the directory does !not exist
            if (!File::exists($absolutePath)) {
                // Create the directory
                File::makeDirectory($absolutePath, 0755, true);
            }

            // Upload the image to the local file system
            file_put_contents($relativePath, $image);

            // Return the image location
            return $relativePath;
        }

        /**
         * Soft delete an image from the file system
         */
        public function soft_delete()
        {
            // Under construction ...   
        }

        /**
         * Delete an image from the file system
         */
        public function delete()
        {
            // Under construction ...   
        }
    }
}
