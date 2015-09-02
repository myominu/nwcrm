<?php if(in_array($this->request->session()->read('Auth.User.role'), ['admin'])) { ?>
<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
<?php } ?>