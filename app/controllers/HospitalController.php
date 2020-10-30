<?php

class HospitalController extends Controller
{
    public function isLoggedin()
    {
        if (isset($_SESSION['Auth']) && $_SESSION['type'] == "hospital")
            return true;
        return false;
    }


    public function showAddBloodInfoPage()
    {
        if($this->isLoggedin())
            return view('hospital.addbloodinfo');
        header('location: /hospital/login');
    }

    public function showDashboard()
    {
        if($this->isLoggedin()){
            $hospital_id = $_SESSION['Auth'];
            $query = "select * from bloodsample where hospital_id='$hospital_id';";
            $samples = mysqli_query($this->db, $query);
            return view('hospital.dashboard', ["samples" => $samples]);
        }
        header('location: /hospital/login');
    }

    public function addNewBloodSample()
    {
        if($this->isLoggedin()){

            $hospital_id = $_SESSION['Auth'];
            $blood_type = $_POST['blood_group'];
            $unit = $_POST['blood_unit'];
            $query = "select * from bloodsample where hospital_id='$hospital_id'and blood_type='$blood_type';";
    
            $record = mysqli_query($this->db, $query);
    
            if(!$record) echo mysqli_error($this->db);
            
            if(mysqli_num_rows($record) > 0){
                $newUnit = mysqli_fetch_assoc($record)['unit'] + $unit;
                $updateQuery = "UPDATE bloodsample SET unit ='$newUnit'WHERE hospital_id='$hospital_id'and blood_type='$blood_type';";
    
                if(mysqli_query($this->db, $updateQuery)){
                    header('location: /hospital/dashboard');
                }
                else echo "something wrong happened".mysqli_error($this->db);
            }
            else{
                $insert_query = "INSERT into bloodsample (blood_type,unit,hospital_id) values('$blood_type', '$unit', '$hospital_id');";
    
                if(mysqli_query($this->db, $insert_query))
                    header('location: /hospital/dashboard');
                else echo "failed";
            }
        }
        // header('location: /hospital/login');
    }
    
    public function viewRequests()
    {
        if($this->isLoggedin())
        {
            $hospital_id = $_SESSION['Auth'];
            $query = "select r.fname, r.lname, s.blood_group, s.blood_unit,r.phone from samplerequests as s,receiver as r where s.hospital_id='$hospital_id'and s.receiver_id=r.id;";
            $request = mysqli_query($this->db,$query);
            if(!$request) echo mysqli_error($this->db);

            return view('hospital.viewrequests',["requests"=>$request]);
        }
    }
}
