<?php 
    ini_set('display_errors', 1);
class Action{
    private $db;
    public function __construct(){
        ob_start();
        include 'db_connet.php';
        $this->db=$conn;
    }
    function __destruct()
    {
        $this->db->close();
        ob_end_flush();
    }
    function login(){
        extract($_POST);
        $qry=$this->db->query("SElect * from taikhoan where 
        Tendangnhap='".$username."' and Password='".$password."' and Phanquyen='Admin'");
        if($qry->num_rows>0){
            foreach($qry->fetch_array() as $key=>$value){

                //can sua
                if($key != 'Passwors' && !is_numeric($key)){
                    $_SESSION['login_'.$key]=$value;

                }
            }
                return 1;
        }else{
            return 3;
        }

    }
    function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
    function delete_doctor(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM bacsi where ID_Bacsi = ".$id);
		if($delete)
			return 1;
	}
    function delete_appointment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM lichlamviec where ID_Lich = ".$id);
		if($delete)
			return 1;
	}
}
?>