<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Dwoo Parser Class
 *
 * @package     Bonfire\Core\Libraries
 * @category    Upload
 * @author      Andrew MacKay
 * @link        http://oi-sendai.github.com
 */
class MY_Upload extends CI_Upload
{
//     /**/
	// function __construct()
	// {
	// 	parent::__construct();
	//   // assign by reference - not a copy
	//   $CI =& get_instance();
 //      $CI->load->library('users/auth');
	// }

//       // $blah = 
//       // $array = json_decode(json_encode($blah),true);
//       // echo'<pre><code>';print_r($blah);echo '</code></pre>';die;
//       // echo'<pre><code>';print_r($blah->set_current_user());echo '</code></pre>';die;

// 	}
// 	*
// 	 * Set the file name
// 	 *
// 	 * This function takes a filename/path as input and looks for the
// 	 * existence of a file with the same name. If found, it will append a
// 	 * number to the end of the filename to avoid overwriting a pre-existing file.
// 	 *
// 	 * @param	string
// 	 * @param	string
// 	 * @return	string
	 
	public function set_filename($path, $filename)
	{
		// assign by reference - not a copy
		$CI =& get_instance();

      	// Access username name from session
      	$username = $CI->session->userdata('auth_custom');

		// The epochtime 
		$time = time();

		if ($this->encrypt_name == TRUE)
		{
			mt_srand();
			$filename = md5(uniqid(mt_rand())).$this->file_ext;
		}

		if ( ! file_exists($path.$filename))
		{
			// Build our new filename
			$new_filename = $username.$time.$filename; 
			return $new_filename;
		}

		$filename = str_replace($this->file_ext, '', $filename);

		$new_filename = '';
		for ($i = 1; $i < 100; $i++)
		{
			if ( ! file_exists($path.$filename.$i.$this->file_ext))
			{
				$new_filename = $filename.$i.$this->file_ext;
				break;
			}
		}

		if ($new_filename == '')
		{
			$this->set_error('upload_bad_filename');
			return FALSE;
		}
		else
		{
			// Build our new filename
			$new_filename = $username.$time.$filename.$this->file_ext; 
			return $new_filename;
		}
	}

}
// }