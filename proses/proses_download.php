<?php 

    if (isset($_GET['nama_berkas'])) {
    $filename    = $_GET['nama_berkas'];

    $back_dir    ="http://localhost/spk-skripsi/file/";
    $filedir = $back_dir.$_GET['nama_berkas'];
     
        // if (file_exists($file)) {
        //     header('Content-Description: File Transfer');
        //     header('Content-Type: application/octet-stream');
        //     header('Content-Disposition: attachment; filename='.$file);
        //     header('Content-Transfer-Encoding: binary');
        //     header('Expires: 0');
        //     header('Cache-Control: private');
        //     header('Pragma: private');
        //     header('Content-Length: ' . filesize($file));
        //     ob_clean();
        //     flush();
        //     readfile($file);
            
        //     exit;
        if(!ISSET($_REQUEST[$filedir])){
             $file = $_REQUEST['nama_berkas'];
             
              //header("Cache-Control: public");
              //header("Content-Description: File Transfer");
             header("Content-Disposition: attachment; filename=".basename($file));
             header("Content-Type: application/octet-stream;");
              //header("Content-Transfer-Encoding: binary");
             readfile("files/".$file);

        } else {
            // $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
            // header("location:index.php");
            echo "File nggk ada om";
            echo $file;
        }
    }else{
        echo "cuk";
    }
?>