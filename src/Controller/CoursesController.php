<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Core\Configure;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$courses = $this->paginate($this->Courses);
        $courses = $this->Courses->find()->orderAsc('name')->all();
        $years = [1=>[],2=>[],3=>[],4=>[],5=>[],6=>[],0=>[]];
        foreach($courses as $course){
        	switch($course->year){
        		case 1: //bachelor first year
        		case 2: //bachelor second year
        		case 3: //bachelor third year
        		case 4: //master first year
        		case 5: //master second year
        		case 6: //free-choice exams
        			array_push($years[$course->year],$course);
        			break;
        		default: //inactive courses
        			array_push($years[0],$course);
        			break;
        	}
        }

        $this->set('years',$years);
        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Professorships'=>['Professors','Exams'=>['Solutions']]]
        ]);

        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        
        //find available logos
        $courseLogosFolder = new Folder(Configure::read('App.courseLogosPath'));
        $availableLogos = $courseLogosFolder->find();
        foreach($availableLogos as $logo){
        	$logos[$logo] = $logo;
        }
        
        $this->set('logos',$logos);
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get','post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
