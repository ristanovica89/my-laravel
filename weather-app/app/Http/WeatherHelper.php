<?php

namespace App\Http;

class WeatherHelper
{

  public static function getColor($temperature)
  {
     $color = 'text-gray-800';

        if($temperature <= 0){
            $color = 'text-sky-500';
        }elseif($temperature > 0 && $temperature <= 15){
            $color = 'text-blue-700';
        }elseif($temperature > 15 && $temperature <= 25){
            $color = 'text-green-600';
        }elseif($temperature > 25){
            $color = 'text-red-600';
        }

        return $color;
  }

  public static function getEmoji($weather)
  {
    $emoji = match($weather){
        'sunny' => '☀️',
        'cloudy' => '☁️',
        'windy' => '🌬️',
        'rainy' => '🌧️',
        'snowy' => '❄️',
        'clear' => '🌟',
        'default' => '/',
    };

    return $emoji;
  }














}