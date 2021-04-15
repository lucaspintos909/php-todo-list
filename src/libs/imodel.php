<?php

interface IModel{

    public function saveUser();
    public function getAllUsers();
    public function getUser($id);
    public function deleteUser($id);
    public function updateUser();
    public function from($array);


}