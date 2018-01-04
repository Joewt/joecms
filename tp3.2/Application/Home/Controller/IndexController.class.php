<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 首页的显示逻辑部分
 *
 */
class IndexController extends CommonController {
    public function index(){
        //获取排行
        $rankNews = $this->getRank();
        // 获取首页大图数据
        $topPicNews = D("PositionContent")->select(array('status'=>1,'position_id'=>2),1);
        // 首页3小图推荐
        $topSmailNews = D("PositionContent")->select(array('status'=>1,'position_id'=>3),3);
        $listNews = D("News")->select(array('status'=>1,'thumb'=>array('neq','')),30);
        $advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);
        $this->assign('result',array(
            'topPicNews' => $topPicNews,
            'topSmailNews' => $topSmailNews,
            'listNews' => $listNews,
            'advNews' => $advNews,
            'rankNews' => $rankNews,
            'catId' => 0,
        ));
        $this->display();
    }
    public function header(){

    }
    public function getCount() {
        if(!$_POST) {
            return show(0, '没有任何内容');
        }

        $newsIds =  array_unique($_POST);

        try{
            $list = D("News")->getNewsByNewsIdIn($newsIds);
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }

        if(!$list) {
            return show(0, 'notdataa');
        }

        $data = array();
        foreach($list as $k=>$v) {
            $data[$v['news_id']] = $v['count'];
        }
        return show(1, 'success', $data);
    }
}