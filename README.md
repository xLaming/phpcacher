# PHPCacher
  * Simple Advanced PHP Caching System
  
# Usage:
  * 1. First you need to initialize the class
  * 2. Now you need to set the directory
  * 3. Finally you load the file
  
# Functions:
  ### PHPCacher::setDir($dir)
    * (string) Set the main directory that will be stored all files
    
  ### PHPCacher::setMinify($value) - OPTIONAL
    * (bool) Enable or disable minify system (HTML, JavaScript and CSS)
    
  ### PHPCacher::setExpiration($value) - OPTIONAL
    * (int) Set an expiration time (in seconds) that will be used in caching system
  
  ### PHPCacher::loadFile($name, $ext)
    * (string) - (string) Used to load files, $name is the file name and $ext is the extension
    
# Notes:
 * Automatically when a file is changed by the developer, it will force the user update the file cached in their browser.

# Examples:
 * https://paulao.me/phpcacher/example.php?f=bootstrap&e=css
 * https://paulao.me/phpcacher/example.php?f=jquery&e=js
 * https://paulao.me/phpcacher/example.php?f=welcome&e=html
