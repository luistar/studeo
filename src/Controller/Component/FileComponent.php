<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\File;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use App\Model\Entity\Exam;
use Cake\I18n\Date;

class FileComponent extends Component {

	//TODO localize this component!
	public function getErrorMessage(array $file){
		if(isset($file['error'])){
			switch($file['error']){
				case UPLOAD_ERR_OK:
					return null;
				case UPLOAD_ERR_INI_SIZE:
					return 'Il file caricato supera le dimensioni massime permesse (dimensione del file: ' . $file['size'] . ' - dimensione massima consentita: ' . ini_get('upload_max_filesize');
				case UPLOAD_ERR_FORM_SIZE:
					return 'Il file caricato supera le dimensioni massime permesse (dimensione del file: ' . $file['size'] . ' - dimensione massima consentita: ' . ini_get('upload_max_filesize');
				case UPLOAD_ERR_PARTIAL:
					return 'Il caricamento del file è riuscito soltanto parzialmente. Riprovare.';
				case UPLOAD_ERR_NO_FILE:
					return 'Nessun file caricato.';
				case UPLOAD_ERR_NO_TMP_DIR:
					return 'Impossibile proseguire. Non è presente nessuna tabella temporanea.';
				case UPLOAD_ERR_CANT_WRITE:
					return 'Impossibile scrivere su disco.';
				case UPLOAD_ERR_EXTENSION:
					return 'Una estensione di PHP ha impedito il caricamento del file.';
				default:
					return 'Errore generico.';
			}
		}
	}
	
	public function checkMimeType(array $file, array $allowedArray){
		$uploadedFile = new File($file['tmp_name']);
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		return (array_key_exists($extension, $allowedArray) && $allowedArray[$extension]==$uploadedFile->mime() && $uploadedFile->mime()==$file['type']);
	}
	
	
	public function moveUploadedFileExams($exam){
		$fileUploadPath = Configure::read('App.examUploadPath');
		$fileName = ($exam->date) ? $exam->date->format('Y_m_d') : 'dateUnknown';
		$extension = pathinfo($exam->file['name'], PATHINFO_EXTENSION);
		$fileName .= '.' . $extension;
		$Professorships = TableRegistry::get('Professorships');
		$professorship = $Professorships->get($exam->professorship_id,['contain'=>'Courses']);
		$savePath = $fileUploadPath . $professorship->course->id . DS . $professorship->id;
		
		$count = 1; //contatore per il (count) da aggiungere al nome dei file che si ripetono.
		while(file_exists($savePath . DS . $fileName)){
			$fileName = basename($this->request->data['file']['name'] , $extension) . '_' . ++$count . '.' . $extension;
		}
		if(!is_dir($savePath))
			mkdir($savePath,0777,true);
		if(!move_uploaded_file($exam->file['tmp_name'], $savePath . DS . $fileName)){
			return false;
		}
		return $fileName;
	}
}