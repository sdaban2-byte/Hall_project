<?php
namespace App\Http\Controllers;
use App\Models\Service;
class ServiceController extends CmsCrudController { protected string $model=Service::class; protected string $route='services'; protected string $title='Service'; protected array $fields=['name'=>['label'=>'Name','type'=>'text']]; }
