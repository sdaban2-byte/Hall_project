<?php
namespace App\Http\Controllers;
use App\Models\HallService; use App\Models\Hall; use App\Models\Service;
class HallServiceController extends CmsCrudController { protected string $model=HallService::class; protected string $route='hall-services'; protected string $title='Hall Service'; protected array $fields=['hall_id'=>['label'=>'Hall','type'=>'select','options'=>'halls','option_label'=>'name'],'service_id'=>['label'=>'Service','type'=>'select','options'=>'services','option_label'=>'name']]; protected function viewData(): array { return ['halls'=>Hall::all(), 'services'=>Service::all()]; } }
