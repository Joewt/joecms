<?php
namespace Common\Model;
use Think\Model;

/**
 * 用户组操作
 * 
 */
class AdminModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('admin');
	}

    /**
     * 通过传进来的用户名获取 管理员信息
     * @param string $username
     * @return mixed
     */
    public function getAdminByUsername($username='') {
        $res = $this->_db->where('username="'.$username.'"')->find();

        return $res;
    }
    //通过 传进来的id获取管理员信息
    public function getAdminByAdminId($adminId=0) {
        $res = $this->_db->where('admin_id='.$adminId)->find();
        return $res;
    }
    /**
     * 更新用户数据
     */
    public function updateByAdminId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('admin_id='.$id)->save($data); // 根据条件更新记录
    }
    //添加新的管理员
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //获取管理员信息 过滤掉删除的管理员
    public function getAdmins() {
        $data = array(
            'status' => array('neq',-1),
        );
        return $this->_db->where($data)->order('admin_id desc')->select();
    }
    /**
     * 通过id更新的状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('admin_id='.$id)->save($data); // 根据条件更新记录

    }

    public function getLastLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' => array("gt",$time),
        );

        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }

}