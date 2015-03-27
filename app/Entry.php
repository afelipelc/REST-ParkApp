<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model {

	//

  public function rate()
  {
    return $this->hasOne('App\Rate');
  }

  public function car()
  {
    return $this->hasOne('App\Car');
  }
}
