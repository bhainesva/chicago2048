<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title>submit.php</title>
</head>
<body>
    <?php
        $upload_dir = "./img";
        if(isset($_FILES['file']['tmp_name']));
        {
            // Number of uploaded files
            $num_files = count($_FILES['file']['tmp_name']);

            /** loop through the array of files ***/
            for($i=0; $i < $num_files;$i++)
            {
                // check if there is a file in the array
                if(!is_uploaded_file($_FILES['file']['tmp_name'][$i]))
                {
                    $messages[] = 'No file uploaded';
                }
                else
                {
                    // copy the file to the specified dir 
                    $path = $_FILES['file']['name'][$i];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    if(@copy($_FILES['file']['tmp_name'][$i],$upload_dir.'/'.($i + 1).'.'.$ext))
                    {
                        /*** give praise and thanks to the php gods ***/
                        $messages[] = $_FILES['file']['name'][$i].' uploaded';
                    }
                    else
                    {
                        /*** an error message ***/
                        $messages[] = 'Uploading '.$_FILES['file']['name'][$i].' Failed';
                    }
                }
            }
        }
    ?>

    <center><h1>
        Hello<br />
        <?php echo($messages[0]); ?><br />
    </h1></center>
</body>
</html>
