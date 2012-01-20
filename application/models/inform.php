<?php

class Inform extends CI_Model
{
    function __construct() {
        parent::__construct();
        
        
    }
        
    function send2phone($id,$subject,$message)
    {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'eizsole@gmail.com';
        $config['smtp_pass'] = 'gfhjkm123';
        
        $this->load->library('email', $config);
        $this->load->model('mail');
        
        $this->email->set_newline("\r\n");
        $this->email->from('eizsole@gmail.com', 'e-izsole');
        
        
        $formats = array(
            '1' => '%d@sms.lmt.lv',
            '2' => '371%d@sms.tele2.lv',
            '4' => '371%d@bifri.lv',
            '3' => '371%d@biteplus.lv'
        );
        $phone = $this->mail->getUserPhone($id);
        $to = sprintf($formats[$phone->mobile_operator],$phone->phone_number);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    
    function send2email($id,$subject,$message)
    {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'eizsole@gmail.com';
        $config['smtp_pass'] = 'gfhjkm123';
        
        $this->load->library('email', $config);
        $this->load->model('mail');
        
        $this->email->set_newline("\r\n");
        $this->email->from('eizsole@gmail.com', 'e-izsole');
        
        $to = $this->mail->getUserMail($id); 
        $this->email->to($to); 
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    
    function sendVerificationCodeEmail($id)
    {
        
    }
}

?>