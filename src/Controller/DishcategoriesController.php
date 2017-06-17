<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dishcategories Controller
 *
 * @property \App\Model\Table\DishcategoriesTable $Dishcategories
 *
 * @method \App\Model\Entity\Dishcategory[] paginate($object = null, array $settings = [])
 */
class DishcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dishcategories = $this->paginate($this->Dishcategories);

        $this->set(compact('dishcategories'));
        $this->set('_serialize', ['dishcategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Dishcategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dishcategory = $this->Dishcategories->get($id, [
            'contain' => []
        ]);

        $this->set('dishcategory', $dishcategory);
        $this->set('_serialize', ['dishcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dishcategory = $this->Dishcategories->newEntity();
        if ($this->request->is('post')) {
            $dishcategory = $this->Dishcategories->patchEntity($dishcategory, $this->request->getData());
            if ($this->Dishcategories->save($dishcategory)) {
                $this->Flash->success(__('The dishcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dishcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('dishcategory'));
        $this->set('_serialize', ['dishcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dishcategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dishcategory = $this->Dishcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dishcategory = $this->Dishcategories->patchEntity($dishcategory, $this->request->getData());
            if ($this->Dishcategories->save($dishcategory)) {
                $this->Flash->success(__('The dishcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dishcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('dishcategory'));
        $this->set('_serialize', ['dishcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dishcategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dishcategory = $this->Dishcategories->get($id);
        if ($this->Dishcategories->delete($dishcategory)) {
            $this->Flash->success(__('The dishcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The dishcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
