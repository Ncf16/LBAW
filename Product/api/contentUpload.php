<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/curricularUploads.php');

$maxSize = 8000;
$maxUnitContents = 20;
$storagePath = $BASE_DIR . 'storage/';
$accessPath = $BASE_URL . 'storage/';

if (!($_POST['filepresentationname']))
    $filepresentationName = $_FILES['file']['name'];
else
    $filepresentationName = $_POST['filepresentationname'];

if (!isset($_POST['action'])) {
    return_error('No action specified');
} else
    $action = $_POST['action'];

if ($action == 'add') {

    if (!isset($_FILES['file']))
        return_error('No file specified for action: ' . $action);

    if (!isset($_POST['unitID'])) {
        return_error('No action specified');
    } else
        $unitID = $_POST['unitID'];

    // The file
    $source = $_FILES['file']['tmp_name'];

    if ($source == '') {
        $error = $_FILES['file']['error'];

        if ($error !== UPLOAD_ERR_OK) {
            $message = codeToMessage($_FILES['file']['error']);
            return_error($message);
        } else {
            return_error('The file isn\'t valid');
        }
    }

    $path = $_FILES['file']['name'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    // Generate name, based on photo
    $fileName = $unitID . "_" . md5_file($source) . "." . $extension;
    $fileStoragePath = $storagePath . $fileName;
    $fileAccessPath = $accessPath . $fileName;

    if (file_exists($fileStoragePath))
        return_error("File already exists");

    if (($nrUploads = countUnitContents($unitID)) !== false) {
        if ($nrUploads['nruploads'] > $maxUnitContents) {
            return_error("Maximum nr. of uploads reached");
        }
    }

    //Move Uploaded File to Storage
    $result = insertContentDB($unitID, $fileAccessPath, $filepresentationName);
    if (isset($result['error'])) {
        return_error($result['error']);
    } else {
        $uploadid = $result['uploadid'];
    }


    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {  // IF THE FILE IS OK
        if (move_uploaded_file($_FILES['file']['tmp_name'], $fileStoragePath)) {
            // Succes in both DB and server upload
            echo json_encode(array('success' => $photo_name));
        } else {
            // Failed server upload. Must remove DB entry
            $result = deleteContentDB($uploadid);
            if (isset($result['error'])) {
                return_error($result['error']);
            }
            //return_error(array($file_name, $extension, $fileStoragePath, $source));
            return_error('Couldn\'t move file to server');
        }
    } else {
        $result = deleteContentDB($uploadid);
        if (isset($result['error'])) {
            return_error($result['error']);
        }

        return_error($_FILES['file']['error'] == UPLOAD_ERR_OK);
    }


} else if ($action == 'delete') {
    echo json_encode(array('success' => 'success'));
} else {
    echo json_encode('Invalid action');
}

function codeToMessage($code)
{
    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file is too big";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file is too big";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;

        default:
            $message = "Unknown upload error";
            break;
    }
    return $message;
}

function return_error($error)
{

    http_response_code(422);
    echo json_encode(array('error' => $error));

    die();
}

?>