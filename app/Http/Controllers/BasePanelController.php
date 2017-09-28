<?php

namespace App\Http\Controllers;

class BasePanelController extends Controller
{
    /**
     * @var string
     */
    protected $view_path;
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param null $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view = null, $data = [])
    {
        $data = array_merge($this->data, $data);
        $view = 'panel.' . $this->view_path . '.' . $view;
        return view($view, $data);
    }
}
