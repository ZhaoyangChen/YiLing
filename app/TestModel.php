<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TestModel extends Eloquent
{
	protected $collection = 'TestModel';
}
