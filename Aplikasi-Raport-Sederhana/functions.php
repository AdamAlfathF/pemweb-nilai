<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","raport");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}

$con = dbConnect();


function bisa($con, $query)
{
    $db = mysqli_query($con, $query);

    if ($db) {
        return 1;
    } else {
        return 0;
    }
}

function getListPelajaran()
{
    $conn = dbConnect();
    if($conn->connect_errno==0){
		$res=$conn->query("SELECT * 
						 FROM mata_pelajaran
                         ORDER BY kd_mp");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getList($query)
{
    $conn = dbConnect();
    if($conn->connect_errno==0){
		$res=$conn->query($query);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}


function getListSiswa()
{
    $conn = dbConnect();
    if($conn->connect_errno==0){
		$res=$conn->query("SELECT * 
						 FROM siswa
                         ORDER BY nis");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function ambilsatubaris($conn, $query)
{
    $db = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($db);
}

function hapus($where, $table, $con)
{
    $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    echo $query;
}

function showError($message){
	?>
<div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
<?php echo $message;?>
</div>
	<?php
}
?>