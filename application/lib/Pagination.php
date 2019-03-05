<?php
namespace application\lib;
class Pagination {
    private $max = 10;
    private $route;
    private $index = '';
    private $current_page;
    private $total;
    private $limit;
    private $pathArr;
    private $path;

    public function __construct($route, $total, $limit = 10) {
        $this->route = $route;
        $this->total = $total;
        $this->limit = $limit;
        $this->amount = $this->amount();
        $this->setCurrentPage();

        $this->pathArr = $route;
        if($this->route['controller'] == 'main') array_shift($this->pathArr);
        unset($this->pathArr['page']);
        foreach ($this->pathArr as $data) $this->path .= $data.'/';
        //echo $this->path;
    }
   
    public function get() {
        $links = null;
        $limits = $this->limits();
        $html = '<ul class="pagination">';
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a>'.$page.'</a></li>';
            } else {
                $links .= $this->generateHtml($page);
            }
        }
        if (!is_null($links)) {
            if ($this->current_page > 1) {
                $links = $this->generateHtml(1, 'Назад').$links;
            }
            if ($this->current_page < $this->amount) {
                $links .= $this->generateHtml($this->amount, 'Вперед');
            }
        }
        $html .= $links.' </ul>';
        return $html;
    }
    private function generateHtml($page, $text = null) {
        if (!$text) {
            $text = $page;
        }
        //$this->route['page'] = $page;

        //debug($this->route);

        return '<li><a href="/'.$this->path.$page.'">'.$text.'</a></li>';
    }
    private function limits() {
        $left = $this->current_page - round($this->max / 2);
        $start = $left > 0 ? $left : 1;
        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max;
        }
        else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }
    private function setCurrentPage() {
        if (isset($this->route['page'])) {
            $currentPage = $this->route['page'];
        } else {
            $currentPage = 1;
        }
        $this->current_page = $currentPage;
        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount) {
                $this->current_page = $this->amount;
            }
        } else {
            $this->current_page = 1;
        }
    }
    private function amount() {
        return ceil($this->total / $this->limit);
    }
}