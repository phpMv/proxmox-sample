<?php
namespace controllers;
 use Ajax\php\ubiquity\JsUtils;
 use PHPMV\ProxmoxApi;
 use PHPMV\ProxmoxMaster;
 use Ubiquity\attributes\items\router\Post;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\Router;
 use Ubiquity\utils\http\URequest;
 use Ubiquity\utils\http\UResponse;

 /**
  * Controller TestController
  * @property JsUtils $jquery
  */
class TestController extends \controllers\ControllerBase{
    #[Route('test')]
	public function index(){
        $frm=$this->jquery->semantic()->htmlForm('frm-server');
        $frm->addExtraFieldRule('name','empty');
        $frm->addExtraFieldRule('login','empty');
        $frm->addExtraFieldRule('ip','regExp','invalid ipV4 address','^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:\.(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$');
        $frm->setValidationParams(['on'=>'blur','inline'=>true]);
        $frm->setSubmitParams(Router::path('test.show'),'#response',['hasLoader'=>false]);
        $this->jquery->click('.submit','$("#frm-server").submit()');
        $this->jquery->jsonOn('change','#name',Router::path('test.resolveIp',[]),
            parameters:['attr'=>'value']);
		$this->jquery->renderView("TestController/index.html");
	}



	#[Post(path: "test/show",name: "test.show")]
	public function show(){
        $api=new ProxmoxApi(
            URequest::post('server','servers1.sts-sio-caen.info'),
            URequest::post('login','sio1a')
            ,URequest::post('password','sio1a'));
        $vms=$api->getVMs();
        $dt=$this->jquery->semantic()->dataTable('vms',\stdClass::class,$vms);
        $dt->setFields(ProxmoxMaster::VM_FIELDS);
        $dt->setHasCheckboxes(true);
        $dt->fieldAsLabel('status','server',attributes: ['jsCallback'=>function($lbl,$instance){
            if($instance->status=='running'){
                $lbl->addClass('green');
            }
        }]);
		$this->jquery->renderDefaultView();
	}


	#[Route(path: "resolveIp/{name}",name: "test.resolveIp")]
	public function resolveIp($name){
        UResponse::asJSON();
		echo json_encode(['ip'=>gethostbyname($name)]);
	}

}
