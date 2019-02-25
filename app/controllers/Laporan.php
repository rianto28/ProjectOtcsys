<?php
class Laporan extends Controller {
    public function __construct()
    {   
        $this->pdf =  new Pdf;
    }
    public function contoh()
        {
            $this->view('contoh', $data);
        }
}