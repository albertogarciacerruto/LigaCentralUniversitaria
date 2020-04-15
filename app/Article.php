<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = [
      'title', 'subtitle', 'description', 'content', 'visibility', 'image', 'sport', 'section',
  ];
}
