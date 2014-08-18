<?php
if($this->session->userdata('login_admin')){
$id = $this->session->userdata('id_admin');
$result = $this->Model_setting->get_session_admin($id);
?>
<p><?php echo $result['username'];?> (<a href="#">3 Messages</a>)</p>
<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
<?php
}