<?php

class bdd{
    public function getBdd(){
        return new PDO('mysql:host=localhost;dbname=tpvole;charset=utf8','root','');
    }
}