<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;


class Course extends Model {

	protected $table = 'courses';
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'course_name', 'limit_number', 'course_description', 'course_owner_user_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
			'course_owner_user_id '
	];

	public function owner()
	{
		return $this->belongsTo('App\User', 'course_owner_user_id', 'id');
	}

	public function logs()
	{
		return $this->hasOne('App\Models\Log', 'course_id', 'id');
	}

	public function selected_number()
	{
		return Log::where('course_id', $this->id)->count();
	}

	public function is_selected()
	{
		return (Log::where('course_id', $this->id)->where('student_user_id', Auth::user()->id)->first() == null ? false : true);
	}

}
