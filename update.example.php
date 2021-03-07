<?php
use App\Models\Option;

function update_to(){
    return '1.0.1';
}
function update_script(){
    Option::set('version', '1.0.1');
    return ['success' => 'updated successfully to version : 1.0.1'];
}