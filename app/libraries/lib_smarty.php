<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."third_party/smarty-3.1.30/libs/Smarty.class.php";
class Lib_smarty extends Smarty {
   
    $templateExt = "php";

    function __construct() {
        parent::__construct();

        /* GHI CHU 1 */
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $smarty->setCompileCheck(false);
        $this->setCompileDir(APPPATH . 'cache' . DS . "smarty" . DS . "compile" . DS);
        $this->setCacheDir(APPPATH . 'cache' . DS . "smarty" . DS . "cache" . DS);
        $this->setTemplateDir(APPPATH . 'views' . DS);
    }

    /**
     * Parse a template
     *
     * Parses pseudo-variables contained in the specified template view,
     * replacing them with the data in the second param
     *
     * @param    string
     * @param    array
     * @param    bool
     * @return    string
     */
    public function parse($template, $data = array(), $return = FALSE) {
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                $this->assign($key, $val);
            }
        }

        /* GHI CHU 2 */
        $cache_id = $template. "_" . md5(json_encode($data));
        $compile_id = null;
        
        return $this->fetch("$template.$this->templateExt", $cache_id, $compile_id, null, !$return, TRUE);
    }

    public function display($template = NULL, $cache_id = NULL, $compile_id = NULL, $parent = NULL) {
        return $this->parse($template);
    }

    /* GHI CHU 3 */
    public function __set($key, $value) {
        $this->assign($key, $value);
    }

}

	/* GHI CHU 4 */
	//Auto init and replace the default parser
	$CI = & get_instance();
	$CI->parser = new Core_Smarty();
	$CI->view = &$CI->parser;

	/* End of file Core_smarty.php */