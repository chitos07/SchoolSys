<?php


namespace PHPMVC\LIB\Template;


class Tempalte
{

    use TemplateHelper;

    private $_templateparts;
    private $_action_view;
    private $_data;
    private $_registry;


    public  function __get($key)
    {
        return $this->_registry->$key;
    }
    public function __construct(array $parts)
    {
        $this->_templateparts = $parts;


    }
    public function setActionView($view)
    {

        $this->_action_view = $view;

    }
    public function setAppData($data)
    {

        $this->_data = $data;

    }
    public function swapTemplate($template)
    {

        $this->_templateparts['template'] = $template;

    }
    public function setRegistry($registry)
    {

        $this->_registry = $registry;

    }
    private function renderTamplateHeaderStart()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }
    private function renderTamplateHeaderEnd()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }
    public function renderFooter()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templatefooter.php';

    }
    public function renderTemplateBlocks()
    {

        extract($this->_data);

        if (!array_key_exists('template', $this->_templateparts)) {

            trigger_error('Your Template not here', E_USER_WARNING);

        } else {

            $parts = $this->_templateparts['template'];

            foreach ($parts as $partkey => $file) {

                if ($partkey == ':view') {

                    require_once $this->_action_view;
                } else {
                    require_once $file;
                }

            }

        };


    }
    public function renderTemplateResources()
    {


        $output = '';

        if (!array_key_exists('header_resources', $this->_templateparts)) {

            trigger_error('Your Template not here', E_USER_WARNING);

        } else {

            $resources = $this->_templateparts['header_resources'];

            // Generate Css
            $css = $resources['css'];

            if (!empty($css)) {
                foreach ($css as $cssKey => $path) {

                    $output .= '<link type="text/css" rel="stylesheet" href="' . $path . '">';


                }

            }


            //Generate js
            $js = $resources['js'];
            if (!empty($js)) {
                foreach ($js as $jsKey => $path) {

                    $output .= '<script src="' . $path . '"></script>';

                }

            }


        }

        echo $output;

    }
    public function renderTemplateFooter()
    {

        $output = '';
        if (!array_key_exists('footer_resources', $this->_templateparts)) {

            trigger_error('Your Footer not here', E_USER_WARNING);

        } else {

            $resources = $this->_templateparts['footer_resources'];

            if (!empty($resources)) {
                foreach ($resources as $jsKey => $path) {

                    $output .= '<script src="' . $path . '"></script>';

                }

            }

        }
        echo $output;
    }
    public function renderApp()
    {
        $this->renderTamplateHeaderStart();
        $this->renderTemplateResources();
        $this->renderTamplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderTemplateFooter();
        $this->renderFooter();

    }

}