<?php

class Dokter extends Controller
{
    public function login()
    {
        if (isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        $this->view('templates/header');
        $this->view('dokter/login');
    }

    public function masuk()
    {
        if ($this->model('Dokter_model')->cekEmail($_POST) > 0) {
            if ($this->model('Dokter_model')->cekPassword($_POST) >= 0) { // gak dibuat > 0  dlu karena masih human error
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
        $_SESSION['popup']['login'] = false;
        header('Location: ' . BASEURL . '/dokter/login');
        exit;
    }

    public function logout()
    {
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "/dokter/login");
            exit;
        }
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location: " . BASEURL);
        exit;
    }
}