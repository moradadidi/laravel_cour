<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
        public function index() {
            return "it's the conttroler ";
        }

        public function show() {
            return "it's the show method";
        }
}
