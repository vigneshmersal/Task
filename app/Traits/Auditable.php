<?php

namespace App\Traits;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;

trait Auditable
{
	public static function bootAuditable()
	{
		static::created(function (Model $model) {
			self::audit('created', $model);
		});

		static::updated(function (Model $model) {
			self::audit('updated', $model);
		});

		static::deleted(function (Model $model) {
			self::audit('deleted', $model);
		});
	}

	/**
	 * Audit Log
	 */
	protected static function audit($description, $model)
	{
		if (auth()->check()) {
			AuditLog::create([
				'description'  => $description,
				'subject_id'   => $model->id ?? null,
				'subject_type' => $model->getTable() ?? null,
				'user_id'      => auth()->id() ?? null,
				'properties'   => $model->getDirty() ?? null,
				'host'         => request()->ip() ?? null,
			]);
		}
	}
}
