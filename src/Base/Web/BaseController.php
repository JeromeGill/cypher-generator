<?php
namespace Cypher\Base\Web;
use Cypher\Base\API\BaseAPI;
use Cypher\Base\Utilities\Config;
use Cypher\Base\Utilities\Twig;


/**
 * Class FrontController
 * @package Cypher\Base\Web
 */
class BaseController extends BaseAPI
{
    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->f3 = \Base::instance();
        $this->twig = new Twig();
        $this->page['assets_css_path'] = Config::get('ASSETS_CSS_PATH');
        $this->page['assets_js_path'] = Config::get('ASSETS_JS_PATH');
        $this->page['assets_img_path'] = Config::get('ASSETS_IMG_PATH');
    }

    /**
     * @param $template
     * @param array $pageValues
     */
    protected function render($template, $pageValues = [])
    {
        $template = $this->twig->loadTemplate($template);
        echo $template->render(
            array_merge(
                ['page' => $this->page]
            ),
            $pageValues
        );
    }

    protected function loadTwig()
    {

    }
}
