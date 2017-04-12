<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Log extends Model {

	protected $table = 'logs';
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'student_user_id', 'course_id', 'timestamp'
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'student_user_id', 'id');
	}

	public function course()
	{
		return $this->belongsTo('App\Models\Course', 'course_id', 'id');
	}

}
