<?php

namespace App\Traits;

trait Auditavel
{
    public function bootAuditavel(): void
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });
    }
}