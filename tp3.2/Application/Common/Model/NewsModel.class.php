<?php
namespace Common\Model;
use Think\Model;

/**
 * 文章主表的数据库操作
 * Class NewsModel
 * @package Common\Model
 */
class NewsModel extends Model{
    private $_db='';
    public function __construct(){
        $this->_db=M('news');
    }

    /**
     * 查询文章信息
     * @param array $data
     * @param int $limit
     * @return mixed
     */
    public function select($data=array(),$limit=100){
        $conditions=$data;
        $list=$this->_db->where($conditions)->order('news_id desc')->limit($limit)->select();
        return $list;
    }
    //插入记录
    public function insert($data=array()){
        if(!is_array($data)||!$data){
            return 0;
        }
        $data['create_time']=time();
        $data['username']=getLoginUsername();
        return $this->_db->add($data);
    }
    //获取新闻记录
    public function getNews($data,$page,$pageSize=10){
        $conditions = $data;
        if(isset($data['title'])&&$data['title']){
            $conditions['title']=array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid'])&&$data['catid']){
            $conditions['catid']=intval($data['catid']);
        }
        $conditions['status']=array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($conditions)
            ->order('listorder desc , news_id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }
    //获取新闻总数
    public function getNewsCount($data=array()){
        $conditions=$data;
        if(isset($data['title'])&&$data['title']){
            $conditions['title']=array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid'])&&$data['catid']){
            $conditions['catid']=intval($data['catid']);
        }
        return $this->_db->where($conditions)->count();
    }
    //通过新闻id获取新闻
    public function find($id){
        $data = $this->_db->where('news_id='.$id)->find();
        return $data;
    }
    //通过传递id和data 更新数据
    public function updateById($id,$data){
        if(!$id||!is_numeric($id)){
            throw_exception("ID不合法");
        }
        if(!$data||!is_array($data)){
            throw_exception('更新数组不合法');
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }
    //更改状态
    public function updateStatusById($id,$status){
        if(!is_numeric($status)){
            throw_exception('status不能为非数字');
        }
        if(!$id||!is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['status']=$status;
        return $this->_db->where('news_id='.$id)->save($data);
    }
    //更新排序
    public function updateNewsListorderById($id,$listorder){
        if(!$id||!is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data=array('listorder'=>intval($listorder));
        return $this->_db->where('news_id='.$id)->save($data);
    }
    //根据文章id 返回 文章信息
    public function getNewsByNewsIdIn($newsIds){
        if(!is_array($newsIds)){
            throw_exception('参数不合法');
        }
        $data=array(
            'news_id'=>array('in',implode(',',$newsIds)),
        );
        return $this->_db->where($data)->select();
    }
    //获取排行的数据
    public function getRank($data=array(),$limit=100)
    {
        $list=$this->_db->where($data)->order('count desc,news_id desc')->select();
        return $list;
    }
    //更新阅读数
    public function updateCount($id, $count) 
    {
        if(!$id || !is_numeric($id)) {
            throw_exception("ID 不合法");

        }
        if(!is_numeric($count)) {
            throw_exception("count不能为非数字");
        }

        $data['count'] = $count;
        return $this->_db->where('news_id='.$id)->save($data);

    }

    public function maxcount() 
    {
        $data = array(
            'status' => 1,
        );
        return $this->_db->where($data)->order('count desc')->limit(1)->find();
    }
}
?>