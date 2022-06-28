<?php


function check_already_login()
{
   $ci =& get_instance();
   $user_session = $ci->session->userdata('user_id');
   if ($user_session) {
      redirect('Dashboard');
   }
}


function check_not_login()
{
   $ci =& get_instance();
   $user_session = $ci->session->userdata('user_id');
   if (!$user_session) {
      redirect('Auth/login');
   }
}

function check_admin() 
{
  $ci =& get_instance();
  $ci->load->library('fungsi');
  if($ci->fungsi->user_login()->level != 1) {
    redirect('Dashboard');
  }
}



function indo_currency($nominal)
{
   $result = "rp "  . number_format($nominal, 2, ',','.');
   return  $result;
    //return 'Rp. ' . number_format($nominal, 0, ",", ".");
}



 function indo_date($date)
{
     $d = substr($date ,8,2,);
     $m = substr($date ,5,2,);
     $Y = substr($date ,0,4,);
     return $d.'/'.$m.'/'.$Y;
     
}

?>