<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

	}

	public function index(){
		$this->load->view('payersDetails.php');
	}

	public function getData(){
		
		$response = Array(
			"status"=>false,
			"msg"=>"Sorry..!!, Failed to send money.",
		);

		$dataForRazorpay=Array();


		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$amount=$this->input->post('amount');

		

		if($name!=null && $email!=null && $mobile!=null && $amount!=null &&
		$name!="" && $email!="" && $mobile!="" && $amount!=""){
		

			$dataForRazorpay["CustomerDetails"]=Array(
				"CustomerName"=>$name,
				"CustomerEmail"=>$email,
				"CustomerMobile"=>$mobile,
				"PayAmount"=>$amount
			);
	
			$dataForRazorpay["razorpay_Credentials"]=Array(
				"keyId"=>"rzp_test_QcEG2kj9phJhDZ",
				"secretKey"=>"bAwTrBLlRYRjxF4c7yJoBYaf"
			);

			$this->load->view("razorpay/Razorpay",$dataForRazorpay);

		}
		else{
			echo '<div style="margin-top:20px; text-align:center;"><h1>'.$response['msg'].'</h1><br><a href="<?php echo base_url(); ?>"> << Go Back </a></div>';
		}
	}

	public function paymentSuccess(){
		// echo "<center><h1 style='margin-top:20%;'>Payment Success..!!</h1></center>";
		$data['responseData']=$this->input->post();
		$data['razorpay_Credentials']=[
			'keyId'=>'rzp_test_QcEG2kj9phJhDZ',
			'secretKey'=>'bAwTrBLlRYRjxF4c7yJoBYaf'
		];

		$this->load->view('razorpay/gettingRazorpayPaymentDetails',$data);
	}

	public function paymentFailed(){
		echo "<center><h1 style='margin-top:20%;'>Payment Canceled</h1><br><h3><a href=".base_url().">Home</a></h3></center>";
	} 

}
