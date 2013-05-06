<?php defined('SYSPATH') or die('No direct script access.'); ?>
<style type="text/css">
html,
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    margin: 0px;
    padding: 0px;
}

.block {
    background: #f9f9f9;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.block:hover {
    background: #f2f2f2;
}

.time,
.memory {
    color: #999;
    display: inline-block;
    font-size: 12px;
    margin: 0 5px 0 0;
    padding: 0px;
}

.message {
    color: #111;
    display: block;
    font-size: 12px;
    margin: 0px;
    padding: 0px;
}

.variable_message {
    color: #111;
    display: block;
    font-size: 12px;
    margin: 0px;
    padding: 0px;
    text-decoration: underline;
}

.debug {
    color: #666;
    display: block;
    font-size: 14px;
    margin: 0px;
    padding: 0px;
}
</style>
<?php
if (file_exists(Debugger::file_path()))
{
    include(Debugger::file_path());
}
?>