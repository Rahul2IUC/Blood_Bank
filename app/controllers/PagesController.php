<?php

class PagesController extends Controller
{

    public function home()
    {
        $q = 'SELECT * FROM bloodsample, hospital where bloodsample.hospital_id = hospital.id';
        $samples = mysqli_query($this->db, $q);
        if(!$samples) echo mysqli_error($this->db);
        return view('home', ["samples" => $samples]);
    }
}
