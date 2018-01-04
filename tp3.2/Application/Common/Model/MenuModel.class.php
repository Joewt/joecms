<?php
namespace Common\Model;
use Think\Model;

/**
 * 菜单项的 数据库操作
 * Class MenuModel
 * @package Common\Model
 */
class MenuModel extends Model{

    private $_db='';
    public function __construct(){
        $this->_db=M('menu');
    }

    /**
     * 插入菜单数据
     * @param array $data
     * @return int|mixed
     */
    public function insert($data=array()){
        if(!$data||!is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    /**
     * 获取菜单数据
     * @param $data
     * @param $page
     * @param int $pageSize
     * @return mixed
     */
    public function getMenus($data,$page,$pageSize=10){
        $data['status']=array('neq',-1);
        $offset=($page-1)*$pageSize;
        $list=$this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    /**
     * 菜单总数
     * @param array $data
     * @return mixed
     */
    public function getMenusCount($data=array()){
        $data['status']=array('neq',-1);
        return $this->_db->where($data)->count();
    }
    // 根据id找到 相应的菜单数据
    public function find($id){
        if(!$id||!is_numeric($id)){
            return array();
        }
        return $this->_db->where('menu_id='.$id)->find();
    }

    /**
     * 更新菜单数据
     * @param $id
     * @param $data
     * @return bool
     */
    public function updateMenuById($id,$data){
        if(!$id||!is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!$data||!is_array($data)){
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 更新状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id,$status){
        if(!is_numeric($id)||!$id){
            throw_exception("ID不合法");
        }
        if(!is_numeric($status)||!$status){
            throw_exception("状态不合法");
        }
        $data['status']=$status;
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 更新菜单排序
     * @param $id
     * @param $listorder
     * @return bool
     */
    public function updateMenuListorderById($id,$listorder){
        if(!$id||!is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data=array(
            'listorder'=>intval($listorder),
        );
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    public function getAdminMenus(){
        $data=array(
            'status'=>array('neq',-1),
            'type'=>1,
        );
        return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();

    }
    //获取 导航菜单
    public function getBarMenus(){
        $data = array(
            'status'=>1,
            'type'=>0,
        );
        $res = $this->_db->where($data)
            ->order('listorder desc,menu_id desc')
            ->select();
        return $res;
    }


}