<?php
namespace App\Http\Controllers;
use App\User;

interface GeneralUserController{
    public function update($authenticatable);
}
