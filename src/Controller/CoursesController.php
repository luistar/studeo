<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;

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
        $courses = $this->Courses->find()->contain(['Degrees'])->all();

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
            'contain' => ['Degrees',
            		'Groups'=>[ //recursively load associations
            			'Professorships'=>['Professors', 'Exams'=>['Solutions']]
            		]
            ]
        ]);

        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }

    /**
     * Add method
     * 
     * This action will only be accessible to users with elevated privileges.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $degrees = $this->Courses->Degrees->find('list', ['limit' => 200]);
        /* Acquire list of icon files in /webroot/img/courses/icons */
        $dir = new Folder(ROOT.'/webroot/img/courses/icons');
        $icon_list = $dir->find('.*\.png');
        $this->set('icon_list',$icon_list);
        $this->set(compact('course', 'degrees'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Edit method
     * 
     * This action will only be accessible to users with elevated privileges.
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
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
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $degrees = $this->Courses->Degrees->find('list', ['limit' => 200]);
        /* Acquire list of icon files in /webroot/img/courses/icons */
        $dir = new Folder(ROOT.'/webroot/img/courses/icons');
        $icon_list = $dir->find('.*\.png');
        $this->set('icon_list',$icon_list);
        $this->set(compact('course', 'degrees'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     * 
     * This action will only be accessible to users with elevated privileges.
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Admin Control Panel for Courses
     * 
     * This action will only be accessible to users with elevated privileges.
     */
    public function admin()
    {
    	/* Acquires paginated list of courses to be displayed in tabular form in admin.ctp */
    	$this->paginate = [
            'contain' => ['Degrees']
        ];
        $courses = $this->paginate($this->Courses);
        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }
}
