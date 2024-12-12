<?php

namespace App\Entity;

enum GenreTypeEnum :string
{
    case Novel = 'Roman';
    case Crime = 'Krimi';
    case Fantasy = 'Fantasie';
    case NonFiction = 'Sachbuch';
}
