<?php
    namespace App\Http\RepoInterfaces;
    interface LoginInterface{
        public function Login($data);
        public function Register($data = []);
        public function Logout();
        public function NotFound();
        public function Guest(); 
    }