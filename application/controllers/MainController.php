<?php
namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\core\App;
class MainController extends Controller {

    public function indexAction() {
        if (!empty($_POST)) {
            $params = array(
                'login' => $_POST["login"],
                'password' => $_POST["password"],
                'app' => 'gnomes'
            );
            $result = $this->model->curlQuery('login', $params);
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
            $params = array(
                'login' => $_POST["login"],
                'password' => $_POST["password"],
                'app' => 'gnomes'
            );
            $result = $this->model->curlQuery('register', $params);
            if(!empty($result->message)) {
                $this->view->message('default', $result->message);
            }
            if(!empty($result->user_token)) {
                $this->view->message('default', $result->user_token);
            }
            
        }
    }

    public function addWalletAction() {
        if(!$this->model->checkValidToken()) $this->view->redirect('logout');
        if (isset($_SESSION['user_token'])) {
            $params = array(
                'type' => $this->route['type'],
                'testnet' => $this->route['testnet'],
                'utoken' => $_SESSION["user_token"],
                'app' => 'gnomes'
            );
            $result = $this->model->curlQuery('create', $params);
            if ($result->message == "Successfully.") $this->view->redirect('/profile');
            else exit('Error');
        } else $this->view->redirect('/admin/login');
    }
    public function profileAction() {
        if(!$this->model->checkValidToken()) $this->view->redirect('logout');
        if (isset($_SESSION['user_token'])) {
            $params = array(
                'utoken' => $_SESSION["user_token"],
                'app' => 'gnomes'
            );
            $wallets = $this->model->curlQuery('wallets', $params);
            $wallets = $wallets->wallets;

            /*$params = array(
                'type' => 'ltc',
                'testnet' => 1,
                'utoken' => $_SESSION["user_token"],
                'app' => 'gnomes'
            );
            $result = $this->model->curlQuery('create', $params);*/
            $balance = NULL;

            foreach ($wallets as $wallet) {
                $params = array(
                    'utoken' => $_SESSION["user_token"],
                    'app' => 'gnomes'
                );
                $balance[$wallet->id] = $this->model->curlQuery('balance/'.$wallet->id, $params);
            }
            
            //echo '/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            /*$balance[] = $this->model->curlQuery('/wallet/balance/btc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            $balance[] = $this->model->curlQuery('/wallet/balance/ltc?utoken='.$_SESSION["user_token"].'&app=gnomes');*/
            //echo 'http://176.53.162.231:5000/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            $vars = [
                'wallets' => $wallets,
                'balance' => $balance
            ];
            $this->view->render('Профайл', $vars);
        }
    }
    public function historyAction() {
        if(!$this->model->checkValidToken()) $this->view->redirect('logout');
        if (isset($_SESSION['user_token'])) {
                $params = array(
                    'utoken' => $_SESSION["user_token"],
                    'app' => 'gnomes'
                );
                $wallet = $this->model->curlQuery('wallet/'.$this->route['wid'], $params);
                if(isset($wallet->message)) {
                    $errors = $wallet->message;
                } else {
                    $errors = 0;
                    $wallet = $wallet->wallet;
                }

                $params = array(
                    'utoken' => $_SESSION["user_token"],
                    'app' => 'gnomes'
                );
                $history = $this->model->curlQuery('history/'.$this->route['wid'], $params);

                debug($history);
            //echo '/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            /*$balance[] = $this->model->curlQuery('/wallet/balance/btc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            $balance[] = $this->model->curlQuery('/wallet/balance/ltc?utoken='.$_SESSION["user_token"].'&app=gnomes');*/
            //echo 'http://176.53.162.231:5000/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            $vars = [
                'errors' => $errors,
                'history' => $history,
                'wallet' => $wallet
            ];
            $this->view->render('history', $vars);
        }
    }
    public function sendAction() {
        if (!empty($_POST)) {
            $params = array(
                'ad' => $_POST['to'],
                'va' => $_POST['value'],
                'utoken' => $_SESSION["user_token"],
                'app' => 'gnomes'
            );
            $result = $this->model->curlQuery('send/'.$this->route['wid'], $params);
            debug($result);
//exit(var_dump($result));
            //echo $result;
            if(!empty($result->status)) {
                $this->view->message('default', $result->status);
            }

        }


        if(!$this->model->checkValidToken()) $this->view->redirect('logout');
        if (isset($_SESSION['user_token'])) {
                $params = array(
                    'utoken' => $_SESSION["user_token"],
                    'app' => 'gnomes'
                );
                $wallet = $this->model->curlQuery('wallet/'.$this->route['wid'], $params);
                if(isset($wallet->message)) {
                    $errors = $wallet->message;
                } else {
                    $errors = 0;
                    $wallet = $wallet->wallet;
                }

            //echo '/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            /*$balance[] = $this->model->curlQuery('/wallet/balance/btc?utoken='.$_SESSION["user_token"].'&app=gnomes');
            $balance[] = $this->model->curlQuery('/wallet/balance/ltc?utoken='.$_SESSION["user_token"].'&app=gnomes');*/
            //echo 'http://176.53.162.231:5000/wallet/btc?utoken='.$_SESSION["user_token"].'&app=gnomes';
            $vars = [
                'errors' => $errors,
                'wallet' => $wallet
            ];
            $this->view->render('Профайл', $vars);
        }
    }
    public function ratesAction() {
    		$exampleModel = $this->getModel("Example");
    		$exampleModel->echoExample();
            $prices = $this->model->getCryptoRates();
            $vars = [
                'prices' => $prices,
            ];
            $this->view->render('Rates', $vars);

    }
    public function logoutAction() {
        $params = array(
            'utoken' => $_SESSION["user_token"],
            'app' => 'gnomes'
        );
        $this->model->curlQuery('logout', $params);
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