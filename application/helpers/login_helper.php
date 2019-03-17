<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('ENCKEY', "MCRYPTJULIOVINACHI256");
     
/* - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - */

if(!function_exists('encriptar'))
{
    function encriptar($cadena)
    {
        $CI=get_instance();

        $CI->load->library('encryption');
        $CI->encryption->initialize(
                array(
                        'cipher' => 'aes-256',
                        'mode' => 'ctr',
                        'key' => $CI->config->config['encryption_key']
                )
        );
        return $CI->encryption->encrypt($cadena);
    }
}

if(!function_exists('desencriptar'))
{
    function desencriptar($cadena)
    {
        $CI=get_instance();

        $CI->load->library('encryption');
        $CI->encryption->initialize(
                array(
                        'cipher' => 'aes-256',
                        'mode' => 'ctr',
                        'key' => $CI->config->config['encryption_key']
                )
        );
        return $CI->encryption->decrypt($cadena);
    }
}
     

if ( ! function_exists('isAdmin'))
{
    function isAdmin()
    {
        if(  get_instance()->session->userdata('user_type')==NULL ||  get_instance()->session->userdata('user_type')!='ADMIN')
        {
            redirect('login','refresh');
            exit();
        }
    }
}

if (!function_exists('get_gravatar')) 
{
    function get_gravatar($email)
    {
        $correo=md5( strtolower( trim( $email ) ) );
        $str = @file_get_contents( 'https://www.gravatar.com/'.$correo.'.php' );
        $url_img ="https://www.gravatar.com/avatar/00000000000000000000000000000000";
        if($str===false)
        {
            
        }else{

            $profile = unserialize( $str );

            if ( is_array( $profile ) && isset( $profile['entry'] ) )
            {
                //OLD - $url_img=$profile['entry'][0]['photos'][0]['value'];
                $url_img="https://www.gravatar.com/avatar/".$profile['entry'][0]['requestHash'].".jpg";
            }
        }

        return $url_img;
    }    
}

if ( ! function_exists('generateRandomString'))
{
    function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZJulioVinachi';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) 
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}


if ( ! function_exists('isUser'))
{
    function isUser()
    {

             $CI = get_instance();

            //var_dump($CI->accounts->get_status_user( $CI->session->userdata('user') ));exit();

        if(  $CI->accounts->get_status_user( $CI->session->userdata('user') )=='I' || get_instance()->session->userdata('user_type')==NULL ||  get_instance()->session->userdata('user_type')!='USER')
        {
            #if(get_instance()->session->userdata('user_satus')=='I')
            $CI->load->model('data');
            if($CI->accounts->get_status_user( $CI->session->userdata('user') )=='I')
            {
                get_instance()->session->set_flashdata('error','usuario inactivo' );

            }else{

                get_instance()->session->set_flashdata('error','sesion expirada por favor identifiquese' );
            }
            redirect('login','refresh');
            exit();
        }else{

            $CI->session->set_userdata('user_product',$CI->accounts->get_product());

                    $Ver="GRATIS";
                    $product=$CI->session->userdata('user_product');
            if($product!=NULL)
            {
                /*
                if(existString($product->detail->name,'GRATIS')){
                    $Ver="GRATIS";
                }elseif(existString($product->detail->name,'BASICA')){
                    $Ver="BASICA";
                }elseif (existString($product->detail->name,'MASTER')) {
                    $Ver="MASTER";
                }
                */
                //Nueva Forma que acepta las versiones creadas en el DAP
                $Ver=$product->detail->name;
                
                $CI->session->set_userdata('product_ver',$Ver);
            }else{
                $CI->session->set_userdata('product_ver',"NONE");
                $CI->session->set_flashdata('error',"<strong>ALERTA PRECAUCION</strong> NO SE HA CREADO UN PRODUCTO EN DAP / CREELO CUANTO ANTES / o esta Cuenta No Tiene un PRODUCTO ASIGNADO");
            }

        }
    }
}

if ( ! function_exists('logout'))
{
    function logout()
    {
        $session_destroy = array('user','user_full_name','user_email','user_type','status','validate','lib-chart','google-map','limt_full','product_ver');
        get_instance()->session->unset_userdata($session_destroy);
        get_instance()->session->sess_destroy();
    }
}
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  */
if(! function_exists('decryptPassword'))
{
    function decryptPassword($encrypted)
    {
     //logToFile("decryptPassword1: Incoming password: " . $encrypted);
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(ENCKEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5(ENCKEY))), "\0");
     //logToFile("decryptPassword2: Decrypted password: " . $decrypted);

     if($encrypted != encryptPassword($decrypted) ) {
     //logToFile("This user still has unencrypted pass in db. So returning original back");
     return trim($encrypted);
     }
     return trim($decrypted);
    }
}

if(! function_exists('encryptPassword'))
{
    function encryptPassword($decrypted)
    {
     //logToFile("encryptPassword: Incoming password: $decrypted");
     $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(ENCKEY), $decrypted, MCRYPT_MODE_CBC, md5(md5(ENCKEY))));
     //logToFile("setPassword2: Encrypted password: " . $encrypted);
     return trim($encrypted);
    }
}

if(! function_exists('existString') )
{
    function existString($str,$compare)
    {
        if(strpos( strtolower($str) , strtolower($compare) ) === false)
        {
            return false;
        }else{
            return true;
        }
    }

}

if(! function_exists('getXML') )
{
    function getXML()
    {

             $CI = get_instance();
             // Windows $file = dirname(__FILE__) .'\\..\\..\\xml\\'.$CI->config->config['xml_file'];

             // LINUX
             $file = dirname(__FILE__) .'/../../xml/'.$CI->config->config['xml_file'];
             //var_dump($file);
             if (file_exists($file)) {
                $xml_file = simplexml_load_file($file);
             } else {
                exit('Error abriendo archivo .xml');
            }
            return $xml_file;

    }

}


if(! function_exists('getXMLImport') )
{
    function getXMLImport()
    {

             $CI = get_instance();
             //WINDOWS $file = dirname(__FILE__) .'\\..\\..\\xml\\import\\'.$CI->config->config['xml_file'];

             //LINUX
             $file = dirname(__FILE__) .'/../../xml/import/'.$CI->config->config['xml_file'];
             //var_dump($file);
             if (file_exists($file)) {
                $xml_file = simplexml_load_file($file);
             } else {
                exit('Error abriendo archivo en dir [import] .xml');
            }
            return $xml_file;

    }

}

if(! function_exists('getUserIP'))
{
  function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }
}

if(! function_exists('order_alfabetic') )
{
    function order_alfabetic($original)
    {
        $CI = get_instance();
        $CI->load->model('data');

        $vendedores_numericos=array();
        $vendedores_alfabeticos=array();
        $a=false;
        foreach ($original as $key => $value) {
            $letra=substr($value->Id, 0,1);
            if(strtolower($letra)=='a')
            {
                $a=true;
            }

                $value->Category=$CI->accounts->get_category($value->id_cateories);
                //var_dump( $value->Category ); exit();

            if(!$a)
            {
                $vendedores_numericos[]=$value;
            }else{
                $vendedores_alfabeticos[]=$value;
            }
        }

        foreach ($vendedores_numericos as $key => $value) {
            $vendedores_alfabeticos[]=$value;
        }

        return $vendedores_alfabeticos;

    }

}

if(! function_exists('get_tags_html') )
{

    function get_tags_html($html,$tags)
    {
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        return $doc->getElementsByTagName($tags);
    }
}


if(! function_exists('dameURL') )
{

    function dameURL()
    {
        $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
        return $url;
    }
}

if(! function_exists('get_vendors_tops') )
{
    function get_vendors_tops()
    {

        @$data = file_get_contents("http://www.cbengine.com/");
        if ( preg_match('/<table width=\"100%\" border=\"0\" class=\"productDataTable statsTable v11\" cellpadding=\"2\" cellspacing=\"0\">(.*)<\/table>/s' , $data , $cap ) )
        {
            $part=explode('tbody', $cap[1]);

            $cadena= preg_replace ('/<[^>]*>/', '#', $part[0]);
            $part=explode('#', $cadena);
            $ctr=0;
            foreach ($part as $key => $value) {
                if(trim($value)!='' && $ctr<27)
                {
                    $contenido[]=$value;

                    $ctr++;
                }
            }

            $indice=0;
            $data=array();
            foreach ($contenido as $key2 => $value2)
            {   # oredenando contenido

                    if($indice==3){ $indice=0; }

                    if($indice==0)
                        {
                            $a=array(  'vendor'=>$value2,
                                            'gravity'=>$contenido[($key2+1)],
                                            'delta'=>$contenido[($key2+2)]
                                            );
                            array_push($data,$a);

                        }
                    $indice++;
            }


            }
        return $data;
    }
}
