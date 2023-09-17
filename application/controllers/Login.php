<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();  
        if ( $this->session->userdata('user_id')  ) { 
            redirect('dashboard'); 
        }
    }

    public function index()
	{ 
        $data['page_title'] = "Login"; 
        $this->load->view('login', $data); 
	}

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required');
        if ($this->form_validation->run() == FALSE)
        { 
            $this->session->set_flashdata('error_flashData', 'reCAPTCHA is required, please try again!');
    				redirect('login');
        }
        else
        {
            $secretKey = "6Lf0b8MkAAAAAFrxFqVC1C372c58Pkq6YtzBH2Mv";
            $captcha= $this->input->post('g-recaptcha-response');
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey ?? null) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);

            // if($responseKeys["success"]){
                $login_data = array(
                    'username' => $this->input->post('username', TRUE),
                    'password' => $this->input->post('password', TRUE),
                );
    
                /**
                 * Load User Model
                 */
                $this->load->model('User_model', 'UserModel');
                $result = $this->UserModel->check_login($login_data); 
    
                if (!empty($result['status']) && $result['status'] === TRUE) {
    				// echo $result;
    				// print_r($result);
    
                    /**
                     * Create Session
                     * -----------------
                     * First Load Session Library
                     */
                    $session_array = array(
                        'user_id'  => $result['data']->user_id,
                        'username'  => ucwords($result['data']->username), 
                        'email'  => $result['data']->email, 
                        'firstname'  => $result['data']->first_name, 
                        'lastname'  => $result['data']->last_name, 
                        'profile_picture'  => $result['data']->profile_picture,  
                        'role'  => $result['data']->value,  
                        'station'  => $result['data']->station,  
                        'sub_station'  => $result['data']->sub_station,  
                        'station_id'  => $result['data']->station_id,  
                        'sub_station_id'  => $result['data']->sub_station_id, 
                    );
                    $this->session->set_userdata($session_array);
    
                    $this->session->set_flashdata('message', 'Login Success!');
                    redirect('dashboard');
    
                } else { 
                    $this->session->set_flashdata('error_flashData', 'Username/Password is incorrect!');
    				redirect('login');
                }
            // }else{
            //      $this->session->set_flashdata('error_flashData', 'Error verifying reCAPTCHA, it seems your a robot!');
    		// 		redirect('login');
            // }
            
        }
		 
    }

  
        
}
         