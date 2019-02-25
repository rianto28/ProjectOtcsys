<?php
$conn=@mysql_connect("localhost","root","") or die("Tidak Terkoneksi");
$db=@mysql_select_db("dbams") or die ("Database Tidak Ditemukan");
