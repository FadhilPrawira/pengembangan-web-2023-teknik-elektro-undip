<?php
/**
 *
 * Inspired By http://www.jenssegers.be codeigniter template library
 *
 * @library    	Layout
 * @copyright  	Copyright (c) 2018, sahebul islam
 * @version    	0.1
 * @created     26-08-2018
 * @author     	Sahebul Islam
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

	private $_layout;
	private $_CI;
	private $_js = '';
    private $_assetPath = 'assets/';
    private $_assetJsPath = 'assets/js/';
    private $_assetCssPath = 'assets/css/';

	private $_layoutData = array(
        'title'=>'',
        'js'=>'',
        'css'=>'',
        'meta_description'=>'',
        'meta_keywords' => ''
    );

    /**
     * @param string $key
     * @param array $data
     */
    public function setLayoutCustomData($key,$data)
    {
        $this->_layoutData[$key] = $data;
    }


	/*
	* Initialize with global CI object
	* and global layout
	*/

	public function __construct(){
		$this->_CI =& get_instance();
		$this->_layout = "layout/Layout";
	}

	/*
	* set the title of the page
	* @param string $title
	*/

	public function set_title($title = ""){
		$this->_layoutData['title'] = $title;
    }

	/*
	* Load the view of master layout
	* @param string $view -> sub view which is going to load
	* @param array $data -> same as CI load view data
	*/

	public function view_render($view,$data=null){
		$data["layoutdata"] = $this->_layoutData;
		$this->_layoutData['content'] = $this->_CI->load->view($view,$data,true);
		$this->_CI->load->view($this->_layout,$this->_layoutData);
	}

	/*
	* Adding js files dynamically to the dom
	* @param string $url -> can be local js file path or any http url
	*/

	public function add_js($url,$path = ''){
           $p = (empty($path))?$this->_assetJsPath:$path;
        if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
            $url = $this->_CI->config->item('base_url').$p.$url;
        }

        if(strpos($this->_layoutData['js'],$url) === false){
            $this->_layoutData['js'] .= '<script src="' . htmlspecialchars(strip_tags($url)) . '"></script>' . "\n\t";
        }
	}

	/*
	* Adding css files dynamically to the dom
	* @param string $url -> can be local js file path or any http url
	*/

	public function add_css($url,$path = '', $attributes = FALSE) {
        $p = (empty($path))?$this->_assetCssPath:$path;
        if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
            $url = $this->_CI->config->item('base_url') .$p. $url;
        }

        // legacy support for media
        if (is_string($attributes)) {
            $attributes = array('media' => $attributes);
        }
        if(strpos($this->_layoutData['css'],$url) === false){
            if (is_array($attributes)) {
                $attributeString = "";

                foreach ($attributes as $key => $value) {
                    $attributeString .= $key . '="' . $value . '" ';
                }

                $this->_layoutData['css'] .= '<link rel="stylesheet" href="' . htmlspecialchars(strip_tags($url)) . '" ' . $attributeString . '>' . "\n\t";
            } else {
                $this->_layoutData['css'] .= '<link rel="stylesheet" href="' . htmlspecialchars(strip_tags($url)) . '">' . "\n\t";
            }
        }
    }


    /*
     * @param $description
     *
     * add meta description to layout
     * */

    public function set_meta_description($description){
        $this->_layoutData['meta_description'] = $description;
    }

    /*
     * @param $keywords
     *
     * add meta keywords to layout
     * */

    public function set_meta_keywords($keywords){
        $this->_layoutData['meta_keywords'] = $keywords;
    }


	/*
	* For changing the layout according to the requirement of view.
	* @param string replace the layout property with new value.
	*/

	public function switch_layout($layout = ""){
		if($layout != '') $this->_layout = $layout;
	}

    /*
     * change JS asset path
     * */

    public  function assetJsPath($path = ""){
        if(!empty($path)) $this->_assetJsPath = $path;
    }

    /*
     * change Css asset path
     * */

    public  function assetCssPath($path = ""){
        if(!empty($path)) $this->_assetCssPath = $path;
    }

    /*
     * change asset path
     * */

    public  function assetPath($path = ""){
        if(!empty($path)) $this->_assetPath = $path;
    }

    /*
     * get JS asset path
     * */

    public  function getAssetJsPath(){
        return $this->_assetJsPath;
    }

    /*
     * get Css asset path
     * */

    public function getAssetCssPath(){
        return $this->_assetCssPath;
    }

    public function getAssetPath(){
        return $this->_assetPath;
    }



} // end class

/*
*
* @Path  application/library/Layout.php
*
*/
