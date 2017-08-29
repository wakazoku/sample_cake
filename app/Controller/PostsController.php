<?php

class PostsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');

    // 一覧ページ
    public function index()
    {
        $this->set('posts', $this->Post->find('all'));
    }

    // 詳細ページ
    public function view($postId = null)
    {
        if (!$postId) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($postId);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    // 新規追加
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
    }

    // 編集
    public function edit($postId = null)
    {
        if (!$postId) {
            throw new NotFoundException(__('Invalid post'));
        }
        $postData = $this->Post->findById($postId);
        if (!$postData) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $postId;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been update'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Flash->error(__('Unable to update your post'));
        }

        if (!$this->request->data) {
            $this->request->data = $postData;
        }
    }

    // 削除
    public function delete($postid)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($postid)) {
            $this->Flash->success(__('The post with id: %s has been deleted. ', h('id')));
        } else {
            $this->Flash->error(__('The post with id: %s could not be deleted.', h('id')));
        }
        return $this->redirect(array('action'=>'index'));
    }
}
