<?php

use App\Models\Team;

function getName($id)
{
    return Team::where('id', $id)->first()->name;
}
