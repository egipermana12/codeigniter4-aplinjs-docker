<?php

namespace App\Traits;

trait HasFilters {
    public function loopWhere($data = array()) {
        $wheres = array();
        $count = count($data);
        if($count > 0){
            foreach ($data as $key => $value) {
                $wheres[$key] = $value;
            }
        }
        return $wheres;
    }

    public function loopLikes($data =  array()){
        $likes = array();
        $count = count($data);
        if($count > 0){
            foreach ($data as $key => $value) {
                $likes[$key] = $value;
            }
        }
        return $likes;
    }
}