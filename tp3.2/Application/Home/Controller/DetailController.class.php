<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 文章详情页的展示
 * Class DetailController
 * @package Home\Controller
 */
class DetailController extends CommonController {

    public function index() {
        $id = intval($_GET['id']);
        if(!$id || $id<0) {
            return $this->error("ID不合法");
        }

        $news =  D("News")->find($id);

        if(!$news || $news['status'] != 1) {
            return $this->error("ID不存在或者资讯被关闭");
        }

        $count = intval($news['count']) + 1;
        D('News')->updateCount($id, $count);
        //更新阅读数

        //文章详细内容的显示
        $content = D("NewsContent")->find($id);
        $news['content'] = htmlspecialchars_decode($content['content']);

        //排序
        $advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>5),2);
        $rankNews = $this->getRank();

        $this->assign('result', array(
            'rankNews' => $rankNews,
            'advNews' => $advNews,
            'catId' => $news['catid'],
            'news' => $news,
        ));

        $this->display("Detail/index");
    }

    public function  view() {
        if(!getLoginUsername()) {
            $this->error("您没有权限访问该页面");
        }
        $this->index();
    }
}