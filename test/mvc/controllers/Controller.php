<?php
//controllers/Controller.php

class Controller {
    public $page_title;

    public $error=[];

    public $content;

    /**
     * @param $view_path: đường dẫn tới file view
     * @param array $variables: mảng các biến từ bên ngoài truyền vào view
     */
    public function render($view_path, $variables = []) {
        extract($variables);
        ob_start();
        require "$view_path";
        $render_view = ob_get_clean();

        return $render_view;
    }
}
