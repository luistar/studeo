<?php
namespace App\Controller;

use App\Controller\AppController;

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
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Professorships'=>['Courses','Professors']]
        ];
        $exams = $this->paginate($this->Exams);

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
            'contain' => ['Professorships']
        ]);

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
        $professorshipsAll = $this->Exams->Professorships->find('All',['contain'=>['Professors','Courses']])->orderAsc('Courses.name');
        foreach($professorshipsAll as $professorship){
        	$professorships[$professorship->id] = $professorship->course->name.' ('.$professorship->professor->name.')';
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
}
