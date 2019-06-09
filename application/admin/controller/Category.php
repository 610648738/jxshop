<?php

namespace app\admin\controller;

//use think\cache\driver\Redis;
//namespace app\admin\model;
use think\Db;

/**
 * 类型管理
 */
class Category extends CommonController
{
    private $category = ['手机', '电脑', '男装', '鞋子', '电器', '女裝', 'hh2'];
    public function add()
    {
        if ($this->request->isGet()) {
            return $this->fetch();
        }
        $data = $_POST;
        $query = Db::name('category');
        $result = $query->where('cname', $data['cname'])->find();
        if ($result) {
            return $this->error('类别已经存在');
        }

        if (in_array($data['cname'], $this->category)) {
            
            $res = $query->insert($data);
            if ($res) {
                return $this->success('添加成功', 'index');
            } else {
                return $this->error('添加失败');
            }
        } else {
            return $this->error('类型不符合要求');
        }
    }

    public function index()
    {
        $query = Db::name('category');
        $data = $query->select();
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function del()
    {
        $id = input('id', 0, 'intval');
        $query = Db::name('category');

        $res = $query->delete($id);
        dump($res);
        if ($res) {
            return $this->success('删除成功');
        } else {
            return $this->error('删除失败');
        }
    }

    public function edit()
    {
        $id = input('id', 0, 'intval');
        $data = input();
        $query = Db::name('category');
        if ($this->request->isGet()) {
            $data = $query->where('id', $id)->find();
            $this->assign('data', $data);
            return $this->fetch();
        }

        if (!in_array($data['cname'], $this->category)) {
            return $this->error('修改失败', '', '', 1);
        }
        $res = $query->where('id', $id)->update($data);
        if ($res) {
            return $this->success('修改成功', 'index');
        } else {
            return $this->error('修改失败');
        }
    }
}
