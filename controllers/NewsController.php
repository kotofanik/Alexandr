<?php

require_once ROOT.'/model/News.php';

class NewsController
{
    public function actionList(){
       
        $newsList = News::getNewsList();



        require_once ROOT."/view/news/index.php";
        return true;
    }
    public function actionViews($id){
       

        $newsItem = News::getNewsById($id);
        require_once ROOT . '/view/news/view.php';
        

        return true;
    }
    
}