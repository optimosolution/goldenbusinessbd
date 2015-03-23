<?php

$file = Yii::app()->basePath . '/../uploads/sro/' . $model->attach_file;
if ((!is_file($file)) && (!file_exists($file))) {
    Yii::app()->user->setFlash('error', "The file <strong>" . $model->sro_no . "</strong> does not exist");
    $this->redirect(array('sro/index', 'id' => $model->sro_type));
}
$content = file_get_contents($file);
header('Content-Description: File Transfer');
header("Content-type: application/octet-stream");
//header("Content-type: " . $this->returnMIMEType($model->doc_file));
header('Content-Disposition: attachment; filename="' . basename($model->attach_file) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header("Content-Length: " . filesize($file));
ob_clean();
flush();
echo $content;
exit;
?>
