<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Keyword extends Eloquent
{
	protected $collection = 'Keyword';

	protected $primaryKey = 'name';
}
