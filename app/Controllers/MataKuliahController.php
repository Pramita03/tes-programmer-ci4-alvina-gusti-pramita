<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MataKuliahModel;


class MataKuliahController extends BaseController
{
protected $mkModel;
public function __construct(){ $this->mkModel = new MataKuliahModel(); }
public function index(){
