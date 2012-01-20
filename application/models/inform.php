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
            '1' => '%s@sms.lmt.lv',
            '2' => '371%s@sms.tele2.lv',
            '4' => '371%s@bifri.lv',
            '3' => '371%s@biteplus.lv'
        );
        $phone = $this->mail->getUserPhone($id);
        var_dump($phone->mobile_operator);
        var_dump($phone->phone_number);
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
    
    function send2AllEmails($subject, $message)
    {
        $this->load->model('user_data');
        $ids = $this->user_data->getAllIdForMail();
        foreach ($ids as $id)
        {
            $this->send2email($id->id, $subject, $message);
        }
    }
    
    function send2AllPhones($subject, $message)
    {
        $this->load->model('user_data');
        $ids = $this->user_data->getAllIdForPhone();
        foreach ($ids as $id)
        {
            $this->send2phone($id->id, $subject, $message);
        }
    }
}

?>