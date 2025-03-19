<?php

class bdd{
    public function getBdd(){
        return new PDO('mysql:host=localhost;dbname=tpvol;charset=utf8','root','');
    }
}