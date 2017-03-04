<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 */
class ExamsController extends AppController
{

	public function initialize(){
		parent::initialize();
		$this->loadComponent('File'); //custom component creato in src/Controller/Component
	}
	
	public function isAuthorized($user = null){
		$action = $this->request->params['action'];
		if(in_array($action,['index','view','addToProfessorship','add','download']))
			return true; //all logged users can access these actions
		return parent::isAuthorized($user);
	}
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Professorships'=>['Courses','Professors']]
        ];*/
        $exams = $this->Exams->find('all',['contain' => ['Professorships'=>['Courses','Professors']]]);
        
        $examsCount = $this->Exams->find('all')->count();
		
        $this->set('examsCount',$examsCount);
        $this->set(compact('exams'));
        $this->set('_serialize', ['exams']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => ['Professorships','Solutions']
        ]);
        
        foreach($exam->solutions as $solution){
        	if($solution->author){
        		$solution->userAuthor = TableRegistry::get('PhpbbUsers')->get($solution->author);
        	}
        }

        $this->set('exam', $exam);
        $this->set('_serialize', ['exam']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$professorshipsAll = $this->Exams->Professorships->find('all',['contain'=>['Professors','Courses']])->orderAsc('Courses.name')->all();
    	if($professorshipsAll->count()==0){
    		$this->Flash->error(__("No professorships yet. You cannot add exams until there is at least one professorship."));
    		return $this->redirect(['controller'=>'Exams','action'=>'index']); //redirect to exam index
    	}
    	
        $exam = $this->Exams->newEntity();
        if ($this->request->is(['post','put'])) {     	
        	
            $exam = $this->Exams->patchEntity($exam, $this->request->data);        	
            $error=false;
            $mimeCheck=true;
            // if a file is uploaded
            if($this->request->data['file']['name']){
            	//check for errors
            	$uploadError = $this->File->getErrorMessage($this->request->data['file']); //call to my component
            	//check mime type
            	$mimeCheck = $this->File->checkMimeType($this->request->data['file'],['jpg'=>'image/jpeg','png'=>'image/png','pdf'=>'application/pdf']);
            	//if no upload errors and entity is valid, save file
            	if(!$uploadError && $mimeCheck && !$exam->errors()){
            		$fileName = $this->File->moveUploadedFileExams($exam,$this->request->data['file']);
            		if(!$fileName){
            			$error = __('Move file error.');
            			$this->Flash->error(__('Could not save file in save path.'));
            		}
            		else
            			$exam->path = $fileName;
            	}
            }
            
            if (!$error && $mimeCheck && $this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            if($error)
            	$this->Flash->error($error);
           	if(!$mimeCheck)
           		$this->Flash->error(__('Invalid file type.'));
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        
        foreach($professorshipsAll as $professorship){
        	$professorships[$professorship->id] = $professorship->course->name.' ('.$professorship->professor->name.') '.$professorship->start_date.' - '.$professorship->end_date;
        }
        $this->set(compact('exam', 'professorships'));
        $this->set('_serialize', ['exam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->data);
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $professorships = $this->Exams->Professorships->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'professorships'));
        $this->set('_serialize', ['exam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    /**
     * Download method
     * 
     * @param unknown $id the id of the exam to download
     */
    public function download($id = null)
    {
    	$exam = $this->Exams->get($id,['contain'=>['Professorships'=>['Courses']]]);
    	if(!$exam){
    		$this->Flash->error(__('Download failed: invalid exam.'));
    		return $this->redirect($this->referer());
    	}
    	if($exam->path){ //if there is a path, download the file
    		$file_name = $exam->path;
    		$file_path = Configure::read('App.examUploadPath');
    		$file_path .= $exam->professorship->course->id . DS . $exam->professorship->id . DS;
    		$this->response->file($file_path . $file_name);
    		//$this->response->download(basename($file_name));
    		return $this->response;
    	}else if($exam->url){ //redirect to the url
    		return $this->redirect($exam->url);
    	}
    }
    
    
    /**
     * Creates a new exam for the professorship with the given id.
     * 
     * @param unknown $id
     */
    public function addToProfessorship($id=null)
    {
    	$professorship = TableRegistry::get('Professorships')->get($id,['contain'=>['Courses','Professors']]);
    	if(!$professorship){
    		$this->Flash->error(__('Invalid professorship.'));
    		return $this->redirect($this->referer());
    	}
    	$exam = $this->Exams->newEntity();
    	if ($this->request->is(['post','put'])) {
    		 
    		$exam = $this->Exams->patchEntity($exam, $this->request->data);
    		$exam->professorship_id = $professorship->id;
    		$error=false;
    		$mimeCheck=true;
    		// if a file is uploaded
    		if($this->request->data['file']['name']){
    			//check for errors
    			$uploadError = $this->File->getErrorMessage($this->request->data['file']); //call to my component
    			//check mime type
    			$mimeCheck = $this->File->checkMimeType($this->request->data['file'],['jpg'=>'image/jpeg','png'=>'image/png','pdf'=>'application/pdf']);
    			//if no upload errors and entity is valid, save file
    			if(!$uploadError && $mimeCheck && !$exam->errors()){
    				$fileName = $this->File->moveUploadedFileExams($exam,$this->request->data['file']);
    				if(!$fileName){
    					$error = __('Move file error.');
    					$this->Flash->error(__('Could not save file in save path.'));
    				}
    				else
    					$exam->path = $fileName;
    			}
    		}
    	
    		if (!$error && $mimeCheck && $this->Exams->save($exam)) {
    			$this->Flash->success(__('The exam has been saved.'));
    	
    			return $this->redirect(['controller'=>'Courses','action' => 'view',$professorship->course->id]);
    		}
    		if($error)
    			$this->Flash->error($error);
    		if(!$mimeCheck)
    			$this->Flash->error(__('Invalid file type.'));
    		$this->Flash->error(__('The exam could not be saved. Please, try again.'));
    	}
    	
    	$this->set('exam',$exam);
    	$this->set('professorship',$professorship);
    	$this->set('_serialize', ['exam']);
    }
    
}
