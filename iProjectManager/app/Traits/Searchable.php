<?php
namespace App\Traits;

trait Searchable {

    public function scopeAllOrSearch($query, $field, $search)
    {
        if ( $search ) {
            return $query->whereRaw("$field LIKE ?", ["%$search%"]);
        } else {
            return $query;
        }
    }

}