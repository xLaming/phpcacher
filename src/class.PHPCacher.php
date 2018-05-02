<?php
/**
 * MIT License. Copyright (c) 2018 Paulo Rodriguez
 * PHPCacher - Simple PHP caching system
 *
 * @author Paulo Rodriguez (xLaming)
 * @link https://github.com/xlaming/phpcacher
 * @version 1.1
 */
class PHPCacher
{
	/**
	 * Store the directory
	 * @var string
	 */
	private $dir;

	/**
	 * Enable or disable minify
	 * @var bool
	 */
	private $minify = false;

	/**
	 * Time used to store the cache
	 * @var int
	 */
	private $time   = 21600; // 6 hours

	/**
	 * Directory separator (do not touch)
	 * @var string
	 */
	private $sep    = DIRECTORY_SEPARATOR;

	/**
	 * Mimetype list
	 * @var array
	 */
	private $mimes  = [
		'ai'	    => 'application/postscript',
		'aif'	    => 'audio/x-aiff',
		'aifc'	  => 'audio/x-aiff',
		'aiff'	  => 'audio/x-aiff',
		'asc'	    => 'text/plain',
		'atom'	  => 'application/atom+xml',
		'atom'	  => 'application/atom+xml',
		'au'	    => 'audio/basic',
		'avi'	    => 'video/x-msvideo',
		'bcpio'   => 'application/x-bcpio',
		'bin'	    => 'application/octet-stream',
		'bmp'	    => 'image/bmp',
		'cdf'	    => 'application/x-netcdf',
		'cgm'	    => 'image/cgm',
		'class'   => 'application/octet-stream',
		'cpio'	  => 'application/x-cpio',
		'cpt'	    => 'application/mac-compactpro',
		'csh'	    => 'application/x-csh',
		'css'	    => 'text/css',
		'csv'	    => 'text/csv',
		'dcr'	    => 'application/x-director',
		'dir'	    => 'application/x-director',
		'djv'	    => 'image/vnd.djvu',
		'djvu'	  => 'image/vnd.djvu',
		'dll'	    => 'application/octet-stream',
		'dmg'	    => 'application/octet-stream',
		'dms'	    => 'application/octet-stream',
		'doc'	    => 'application/msword',
		'dtd'	    => 'application/xml-dtd',
		'dvi'	    => 'application/x-dvi',
		'dxr'	    => 'application/x-director',
		'eps'	    => 'application/postscript',
		'etx'	    => 'text/x-setext',
		'exe'	    => 'application/octet-stream',
		'ez'	    => 'application/andrew-inset',
		'gif'	    => 'image/gif',
		'gram'	  => 'application/srgs',
		'grxml'   => 'application/srgs+xml',
		'gtar'	  => 'application/x-gtar',
		'hdf'	    => 'application/x-hdf',
		'hqx'	    => 'application/mac-binhex40',
		'htm'	    => 'text/html',
		'html'	  => 'text/html',
		'ice'	    => 'x-conference/x-cooltalk',
		'ico'	    => 'image/x-icon',
		'ics'	    => 'text/calendar',
		'ief'	    => 'image/ief',
		'ifb'	    => 'text/calendar',
		'iges'	  => 'model/iges',
		'igs'	    => 'model/iges',
		'jpe'	    => 'image/jpeg',
		'jpeg'	  => 'image/jpeg',
		'jpg'	    => 'image/jpeg',
		'js'	    => 'application/x-javascript',
		'json'	  => 'application/json',
		'kar'	    => 'audio/midi',
		'latex'   => 'application/x-latex',
		'lha'	    => 'application/octet-stream',
		'lzh'	    => 'application/octet-stream',
		'm3u'	    => 'audio/x-mpegurl',
		'man'	    => 'application/x-troff-man',
		'mathml'  => 'application/mathml+xml',
		'me'	    => 'application/x-troff-me',
		'mesh'	  => 'model/mesh',
		'mid'	    => 'audio/midi',
		'midi'	  => 'audio/midi',
		'mif'	    => 'application/vnd.mif',
		'mov'	    => 'video/quicktime',
		'movie'   => 'video/x-sgi-movie',
		'mp2'	    => 'audio/mpeg',
		'mp3'	    => 'audio/mpeg',
		'mp4'	    => 'audio/mp4',
		'mpe'	    => 'video/mpeg',
		'mpeg'	  => 'video/mpeg',
		'mpg'	    => 'video/mpeg',
		'mpga'	  => 'audio/mpeg',
		'ms'	    => 'application/x-troff-ms',
		'msh'	    => 'model/mesh',
		'mxu'	    => 'video/vnd.mpegurl',
		'nc'	    => 'application/x-netcdf',
		'oda'	    => 'application/oda',
		'ogg'	    => 'application/ogg',
		'pbm'	    => 'image/x-portable-bitmap',
		'pdb'	    => 'chemical/x-pdb',
		'pdf'	    => 'application/pdf',
		'pgm'	    => 'image/x-portable-graymap',
		'pgn'	    => 'application/x-chess-pgn',
		'png'	    => 'image/png',
		'pnm'	    => 'image/x-portable-anymap',
		'ppm'	    => 'image/x-portable-pixmap',
		'ppt'	    => 'application/vnd.ms-powerpoint',
		'ps'	    => 'application/postscript',
		'qt'	    => 'video/quicktime',
		'ra'	    => 'audio/x-pn-realaudio',
		'ram'	    => 'audio/x-pn-realaudio',
		'ras'	    => 'image/x-cmu-raster',
		'rdf'	    => 'application/rdf+xml',
		'rgb'	    => 'image/x-rgb',
		'rm'	    => 'application/vnd.rn-realmedia',
		'roff'	  => 'application/x-troff',
		'rss'	    => 'application/rss+xml',
		'rtf'	    => 'text/rtf',
		'rtx'	    => 'text/richtext',
		'sgm'	    => 'text/sgml',
		'sgml'	  => 'text/sgml',
		'sh'	    => 'application/x-sh',
		'shar'    => 'application/x-shar',
		'silo'	  => 'model/mesh',
		'sit'	    => 'application/x-stuffit',
		'skd'	    => 'application/x-koan',
		'skm'	    => 'application/x-koan',
		'skp'	    => 'application/x-koan',
		'skt'	    => 'application/x-koan',
		'smi'	    => 'application/smil',
		'smil'	  => 'application/smil',
		'snd'	    => 'audio/basic',
		'so'	    => 'application/octet-stream',
		'spl'	    => 'application/x-futuresplash',
		'src'	    => 'application/x-wais-source',
		'sv4cpio' => 'application/x-sv4cpio',
		'sv4crc'  => 'application/x-sv4crc',
		'svg'	    => 'image/svg+xml',
		'svgz'	  => 'image/svg+xml',
		'swf'	    => 'application/x-shockwave-flash',
		't'	      => 'application/x-troff',
		'tar'	    => 'application/x-tar',
		'tcl'	    => 'application/x-tcl',
		'tex'	    => 'application/x-tex',
		'texi'	  => 'application/x-texinfo',
		'texinfo' => 'application/x-texinfo',
		'tif'	    => 'image/tiff',
		'tiff'	  => 'image/tiff',
		'tr'	    => 'application/x-troff',
		'tsv'	    => 'text/tab-separated-values',
		'txt'	    => 'text/plain',
		'ustar'   => 'application/x-ustar',
		'vcd'	    => 'application/x-cdlink',
		'vrml'	  => 'model/vrml',
		'vxml'	  => 'application/voicexml+xml',
		'wav'	    => 'audio/x-wav',
		'wbmp'	  => 'image/vnd.wap.wbmp',
		'wbxml'   => 'application/vnd.wap.wbxml',
		'wml'	    => 'text/vnd.wap.wml',
		'wmlc'	  => 'application/vnd.wap.wmlc',
		'wmls'	  => 'text/vnd.wap.wmlscript',
		'wmlsc'   => 'application/vnd.wap.wmlscriptc',
		'wrl'	    => 'model/vrml',
		'xbm'	    => 'image/x-xbitmap',
		'xht'	    => 'application/xhtml+xml',
		'xhtml'   => 'application/xhtml+xml',
		'xls'	    => 'application/vnd.ms-excel',
		'xml'	    => 'application/xml',
		'xpm'	    => 'image/x-xpixmap',
		'xsl'	    => 'application/xml',
		'xslt'	  => 'application/xslt+xml',
		'xul'	    => 'application/vnd.mozilla.xul+xml',
		'xwd'	    => 'image/x-xwindowdump',
		'xyz'	    => 'chemical/x-xyz',
		'zip'	    => 'application/zip'
	  ];

	/**
	 * Set directory folder
	 *
	 * @param string $dir directory folder
	 * @return bool
	 */
	public function setDir($dir)
	{
		if(!file_exists($dir))
		{
			die('Folder not found.');
		}
		$this->dir = $dir;
		return true;
	}

	/**
	 * Enable or disable minify system
	 *
	 * @param bool $value true or false
	 */
	public function setMinify($value)
	{
		$this->minify = (bool) $value;
	}

	/**
	 * Set expiration time in the cache
	 *
	 * @param int $value
	 */
	public function setExpiration($value)
	{
		$this->time = (int) $value;
	}

	/**
	 * Main function, used to load files and parse everything
	 *
	 * @param  string $name file name
	 * @param  string $ext  extension
	 * @return bool
	 */
	public function loadFile($name, $ext)
	{
		$file = $this->dir . $this->sep . $name . '.' . $ext;
		if(!file_exists($file))
		{
			die('File not found.');
		}
		ob_flush();
		$this->setMimeType($ext);
		$this->ETagHandler($file);
		$content = $this->minify ? $this->minify(file_get_contents($file), $ext) : file_get_contents($file);
		echo $content;
		ob_end_flush();
	}

	/**
	 * Auto detect how will it minify the code
	 *
	 * @param  string $code      code
	 * @param  string $extension extension
	 * @return string
	 */
	private function minify($code, $extension)
	{
		$ext = strtolower($extension);
		if (empty($code) || empty($ext))
		{
			return $code;
		}
		else if ($ext == 'html')
		{
			return $this->minifyHtml($code);
		}
		else if(in_array($ext, ['css', 'js']))
		{
			return $this->minifyJsCss($code);
		}
		else
		{
			return $code;
		}
	}

	/**
	 * Defines the mimetype
	 *
	 * @param string $extension extension
	 * @return bool
	 */
	private function setMimeType($extension)
	{
		$ext = strtolower($extension);
		if (!in_array($ext, array_keys($this->mimes)))
		{
			die('Extension not found.');
		}
		header('Content-Type: ' . $this->mimes[$ext]);
		return true;
	}

	/**
	 * Minify JavaScriot or CSS code
	 *
	 * @param  string $code code
	 * @return string
	 */
	private function minifyJsCss($code)
	{
		$code = str_replace(["\n", "\r"], '', $code);
		$code = preg_replace('!\s+!', ' ', $code);
		$code = str_replace([' {', ' }', '{ ', '; '], ['{', '}', '{', ';'], $code);
		return $code;
	}

	/**
	 * Minify HTML code
	 *
	 * @param  string $code code
	 * @return string
	 */
	private function minifyHtml($code)
	{
		$regex = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--(.|\s)*?-->/'];
		$replace = ['>', '<', '\\1', ''];
		$code = preg_replace($regex, $replace, $code);
		return $code;
	}

	/**
	 * Handle the caching system
	 *
	 * @param  string $dir file directory
	 */
	private function ETagHandler($dir)
	{
		list($time, $headers) = [
			time(),
			apache_request_headers()
		];
		
		header("Date: " . gmdate("D, d M Y H:i:s", $time) . " GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s", $time) . " GMT");
		header("Expires: " . gmdate("D, d M Y H:i:s", ($time + $this->time)) . " GMT");
		
		if (isset($headers['If-Modified-Since']))
		{
			if (filemtime($dir) > strtotime($headers['If-Modified-Since']))
			{
				return false;
			}
			else if ($time - strtotime($headers['If-Modified-Since']) < $this->time)
			{
				http_response_code(304);
			} 
		}
	}
}
?>
