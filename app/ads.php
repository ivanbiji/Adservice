<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ads extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('title' => $array['title'], 'searchtag' => $array['searchtag'],'description' => $array['description']);
    }
}
