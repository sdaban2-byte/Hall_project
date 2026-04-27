<?php
namespace App\Http\Controllers;
use App\Models\AboutUs;
class AboutUsController extends CmsCrudController { 
    protected string $model=AboutUs::class; protected string $route='aboutUs';
     protected string $title='About Us';
      protected array $fields=['description'=>['label'=>'Description','type'=>'textarea'],'num_halls'=>['label'=>'Num Halls','type'=>'number'],'num_booking'=>['label'=>'Num Booking','type'=>'number'],'rating'=>['label'=>'Rating','type'=>'number']]; }
