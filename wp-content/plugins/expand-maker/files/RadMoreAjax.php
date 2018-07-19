<?php
class RadMoreAjax {
	
	public function init() {
		
		add_action('wp_ajax_delete_rm', array($this, 'deleteRm'));
		add_action('wp_ajax_yrm_switch_status', array($this, 'switchStatus'));
	}
	
	public function deleteRm() {

		check_ajax_referer('YrmNonce', 'ajaxNonce');
		$id  = (int)$_POST['readMoreId'];

		$dataObj = new ReadMoreData();
		$dataObj->setId($id);
		$dataObj->delete();

		echo '';
		die();
	}

	public function switchStatus() {
		check_ajax_referer('YrmNonce', 'ajaxNonce');
		$postId = $_POST['readMoreId'];
		$status = -1;

		if ($_POST['isChecked'] == 'true') {
			$status = true;
		}
		update_option('yrm-read-more-'.$postId, $status);
		wp_die();
	}
}