<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subcategories Controller
 *
 * @property \App\Model\Table\SubcategoriesTable $Subcategories
 *
 * @method \App\Model\Entity\Subcategory[] paginate($object = null, array $settings = [])
 */
class SubcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $subcategories = $this->paginate($this->Subcategories);

        $this->set(compact('subcategories'));
        $this->set('_serialize', ['subcategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);

        $this->set('subcategory', $subcategory);
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subcategory = $this->Subcategories->newEntity();
        if ($this->request->is('post')) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->getData());
            if ($this->Subcategories->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->getData());
            if ($this->Subcategories->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subcategory = $this->Subcategories->get($id);
        if ($this->Subcategories->delete($subcategory)) {
            $this->Flash->success(__('The subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
