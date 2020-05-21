<?php
namespace App\Support;

trait Selectable
{

    public static function scopeToSelectable($query, $key = 'id', $value = 'title', $ext = [])
    {
        $data = [];
        foreach ($query->get() as $item) {
            $fields = [
                'value' => $item->{$key},
                'meaning' => $item->{$value}
            ];

            foreach ($ext as $field) {
                $fields[$field] = $item->{$field};
            }

            $data[$item->id] = $fields;
        };
        return collect($data);
    }

}
