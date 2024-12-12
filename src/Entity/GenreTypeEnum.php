<?php

namespace App\Entity;

enum GenreTypeEnum :string
{
    case Roman = 'Roman';
    case Krimi = 'Krimi';
    case Fantasie = 'Fantasie';
    case Sachbuch = 'Sachbuch';
}
