<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 7:38 PM
 */
namespace Common\Model;
use Think\Model;

/**
 * 文章副表的数据库操作
 * Class NewsContentModel
 * @package Common\Model
 */
class NewsContentModel extends Model{
    private $_db='';
    public function __construct(){
        $this->_db=M('news_content');
    }
    //副表的插入
    public function insert($data=array()){
        if(!$data||!is_array($data)){
            return 0;
        }
        $data['create_time']=time();
        if(isset($data['content'])&&$data['content']){
            $data['content']=htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }

    /**
     * 获取副表的数据
     * @param array|mixed $id
     * @return mixed
     */
    public function find($id){
        return $this->_db->where('news_id='.$id)->find();
    }
    //更新副表的数据
    public function updateNewsById($id,$data){
        if(!$id||!is_numeric($id)){
            throw_exception("ID不合法");
        }
        if(!data||!is_array($data)){
            throw_exception("更新数据不合法");
        }
        if(isset($data['content'])&&$data['content']){
            $data['content']=htmlspecialchars($data['content']);
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }


}
?>