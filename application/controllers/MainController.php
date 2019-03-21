<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class MainController extends Controller {

    public function indexAction() {
        if (!empty($_POST)) {
            $result = $this->model->curlQuery('/login?email='.$_POST["email"].'&password='.$_POST["password"].'&app=gnomes');
            if(!empty($result->message)) {
                $this->view->message('default', $result->message);
            }
            if(!empty($result->user_token)) {

                $_SESSION['user_token'] = $result->user_token;
                $this->view->location('profile');
                //$this->view->message('default', $result->user_token);
            }
            
        }

        $vars = [
        ];
        $this->view->render('Главная', $vars);
    }
    public function registerAction() {
        if (!empty($_POST)) {
            $result = $this->model->curlQuery('/register?email='.$_POST["email"].'&password='.$_POST["password"].'&app=gnomes');
            if(!empty($result->message)) {
                $this->view->message('default', $result->message);
            }
            if(!empty($result->user_token)) {
                $this->view->message('default', $result->user_token);
            }
            
        }
    }
    public function profileAction() {
        if(!$this->model->checkValidToken()) $this->view->redirect('logout');
        if (isset($_SESSION['user_token'])) {
            $result[] = $this->model->curlQuery('/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            $result[] = $this->model->curlQuery('/wallet/ltc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            //echo '/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            $balance[] = $this->model->curlQuery('/wallet/balance/btc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            $balance[] = $this->model->curlQuery('/wallet/balance/ltc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            //echo 'http://176.53.162.231:5000/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            $vars = [
                'data' => $result,
                'balance' => $balance
            ];
            $this->view->render('Профайл', $vars);
        }
    }
    public function sendAction() {
        if (!empty($_POST)) {
            
$result = $this->model->curlQuery('/wallet/send/'.$this->route['type'].'?utoken='.$_SESSION["user_token"].'&to='.$_POST['to'].'&value='.$_POST['value'].'&app=gnomes');
//exit(var_dump($result));
            //echo $result;
            if(!empty($result->status)) {
                $this->view->message('default', $result->status);
            }

        }
    }
    public function ratesAction() {
        
            $prices = $this->model->getCryptoRates();
            $vars = [
                'prices' => $prices,
            ];
            $this->view->render('Rates', $vars);

    }
    public function logoutAction() {
        $this->model->curlQuery('/logout?utoken='.$_SESSION["user_token"].'&app=gnomes');
        unset($_SESSION['user_token']);
        $this->view->redirect('/admin/login');
    }

    public function sendmsgAction() {
    	if (!empty($_POST)){
    		if($this->model->sendFeedBack($_POST)){
    			$this->view->message('Успешно', 'Письмо отправлено. ');
    		}
    		else {
    			$this->view->message('Ошибка', 'Пожалуйста, введите все данные.');
    		}
    	}
    	else{
    		$this->view->message('Ошибка', 'Пожалуйста, введите все данные. ');
    	}

    }






}