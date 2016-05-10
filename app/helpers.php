<?php
use lluminate\Http\Request;
function flash(Request $request, $message, $level = 'info') {
    $request->session()->flash('flash_message', $message);
    $request->session()->flash('flash_message_level', $level);
}