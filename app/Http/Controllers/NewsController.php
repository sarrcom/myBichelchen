<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function getNews()
    {
    $content = file_get_contents('https://www.parents.fr/feeds/rss/etre-parent');
    $flux = new SimpleXmlElement($content);

    return View::make('news', compact('flux'));
    }
}
