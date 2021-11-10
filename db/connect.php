<?php
class data
{
    function connect()
    {
        //select
        $conn = new mysqli('localhost', 'root', '', 'quanlyphongkham');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset('utf8');
        return $conn;
    }

    function executeLesult($sql)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        $list = [];
        while ($row = mysqli_fetch_array($result, 1)) {
            $list[] = $row;
        }
        mysqli_close($conn);
        return $list;
    }
    function execute($sql)
    {
        //cap nhat chen
        $conn = $this->connect();
        mysqli_query($conn, $sql);

        mysqli_close($conn);

    }
    function phantrang($limit,$count){
        $conn = $this->connect();
        $sql="select * from thuoc order by ID_Thuoc
        desc limit $limit,$count";
        $table=mysqli_query($conn,$sql);
        return $table;
        mysqli_close($conn);


    }
    Function dem(){
        $conn = $this->connect();
        $sql="Select * from thuoc";
        $result=mysqli_query($conn, $sql);
        return mysqli_num_rows($result);
        mysqli_close($conn);
    }
    function delete_appointment($id){
		$delete = $this->db->query("DELETE FROM appointment_list where id = ".$id);
		if($delete)
			return 1;
	}
    function executeSingLesult($sql)
    {
        //select 1 row
        $conn = $this->connect();
        $result = mysqli_query($conn, $sql);
        $row = null;
        if ($result != null) {
            $row = mysqli_fetch_array($result, 1);
        }
        return $row;
    }
}
