<?php

namespace App\Models\Traits;

use Illuminate\Database\Schema\Blueprint;

trait BaseEntityColumns
{
    public function addBaseColumns(Blueprint $table)
    {
        $table->string('created_by')->default('admin');
        $table->string('updated_by')->default('admin')->nullable();
    }
}
