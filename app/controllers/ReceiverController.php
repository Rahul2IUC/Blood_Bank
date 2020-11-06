<?php
class ReceiverController extends Controller
{

    public function isLoggedin()
    {
        if (isset($_SESSION['Auth']) && $_SESSION['type'] == "receiver")
            return true;
        return false;
    }

    public function showDashboard()
    {
        $receiver_id = $_SESSION['Auth'];
        $query = "select h.name,s.blood_group,s.blood_unit from samplerequests as s, hospital as h, receiver as r where r.id = s.receiver_id and h.id = s.hospital_id and r.id=".$receiver_id.";";

        $requests = mysqli_query($this->db, $query);
        if(!$requests) echo "unable to retrieve request".mysqli_error($this->db);

        return view('receiver.dashboard', ["requests" => $requests]);
    }

    public function addBloodSampleRequest()
    {
        if($this->isLoggedin()){
            $hospita_id = $_POST['hospital_id'];
            $receiver_id = $_SESSION['Auth'];
            $blood_type = $_POST['blood_type'];
            $blood_unit = $_POST['bloodunitrequest'];
    
            $query = "insert into samplerequests (receiver_id,hospital_id,blood_group,blood_unit) values ('$receiver_id','$hospita_id','$blood_type','$blood_unit');";
            if(mysqli_query($this->db, $query)){
                header('location: /receiver/dashboard');
                return;
            }
            else{
                header('location: /');
                return;
            }
        }
        header('location: /login');
    }
}
