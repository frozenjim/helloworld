<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 04/01/15
 * Time: 11:03 AM
 * filename: JSON_userInfo.php
 * JSON API
 */

set_include_path(get_include_path().PATH_SEPARATOR.'/home/james/projects/helloworld/class');
spl_autoload_extensions('.php, .inc');
spl_autoload_register();

$request_method = $_SERVER['REQUEST_METHOD'];
$arr = array();
$err = array();

switch ($request_method) {

    case 'GET':
        $arr = array('errCount'=>count($err), 'errors'=>$err,'result'=>'You Got!');
        break;

    case 'POST':
        isset($_POST['ACTION']) ? $action=$_POST['ACTION'] : $action='NONE';

        switch ($action){
            case 'POST':
                $arr = array('result'=>'You Posted!');
                break;
            case 'PUT':
                $arr = array('result'=>'You Posted!');
                break;
            case 'DELETE':
                $arr = array('result'=>'You Posted!');
                break;
            default:
                array_push($err,'invalid ACTION');
                array_push($err,'you are an idiot');
                array_push($err,'and you are ugly too');

                $arr = array('errCount'=>count($err),'errors'=>$err,'result'=>'FAIL');
                break;
        }
        break;

    default:
        array_push($err,'invalid REQUEST METHOD');
        array_push($err,'you are an idiot');
        array_push($err,'and you are ugly too');

        $arr = array('errCount'=>count($err),'errors'=>$err,'result'=>'FAIL');
}

header('Content-Type: application/json');
echo json_encode($arr);

