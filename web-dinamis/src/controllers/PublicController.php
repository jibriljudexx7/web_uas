<?php
require_once __DIR__ . '/../models/NewsModel.php';
require_once __DIR__ . '/../models/TourModel.php';

class PublicController {
    private $newsModel;
    private $tourModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
        $this->tourModel = new TourModel();
    }

    public function index() {
        $news = $this->newsModel->getAll();
        $tours = $this->tourModel->getAll();
        
        $pageTitle = 'Echoes of Eternity - Official Metal Band';
        $viewType = 'public';
        
        require_once __DIR__ . '/../views/public.php';
    }
}
