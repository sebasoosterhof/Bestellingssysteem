<?php
// =================================================================
// @Author: Sebastian Oosterhof
// @Description: handles DishesController index, view, add, edit and delete functions.
// @Version: 1.0
// @Date: 29-06-2017
// =================================================================

namespace App\Controller;

use App\Controller\AppController;

/**
 * Dishes Controller
 *
 * @property \App\Model\Table\DishesTable $Dishes
 *
 * @method \App\Model\Entity\Dish[] paginate($object = null, array $settings = [])
 */
class DishesController extends AppController
{
     /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dishes = $this->paginate($this->Dishes);

        $this->loadModel('Subcategories');

        $subcategories = $this->Subcategories->find('all');

        $this->set(compact('dishes', 'subcategories'));
        $this->set('_serialize', ['dishes']);

        $lunchDishes = $this->Dishes->find('all')->where(['categories_id' => 1]);
        $dinerDishes = $this->Dishes->find('all')->where(['categories_id' => 2]);
        $dessertDishes = $this->Dishes->find('all')->where(['categories_id' => 3]);

        $this->set('lunchDishes', $lunchDishes);
        $this->set('dinerDishes', $dinerDishes);
        $this->set('dessertDishes', $dessertDishes);
    }

    /**
     * View method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dish = $this->Dishes->get($id, [
            'contain' => ['Orderlists']
        ]);

        $this->set('dish', $dish);
        $this->set('_serialize', ['dish']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Categories');
        $this->loadModel('Subcategories');

        $categories = $this->Categories->find()->extract('category');
        $subcategories = $this->Subcategories->find()->extract('subcategory');

        $dish = $this->Dishes->newEntity();
        if ($this->request->is('post')) {
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Het gerecht is opgeslagen.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Het gerecht kon niet worden opgeslagen, probeer het opnieuw.'));
        }
        $this->set(compact('dish', 'dishes', 'categories', 'subcategories'));
        $this->set('_serialize', ['dish']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Categories');
        $this->loadModel('Subcategories');

        $categories = $this->Categories->find()->extract('category');
        $subcategories = $this->Subcategories->find()->extract('subcategory');

        $dish = $this->Dishes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Het gerecht is opgeslagen.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Het gerecht kon niet worden opgeslagen, probeer het opnieuw.'));
        }
        $this->set(compact('dish', 'categories', 'subcategories'));
        $this->set('_serialize', ['dish']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dish = $this->Dishes->get($id);
        if ($this->Dishes->delete($dish)) {
            $this->Flash->success(__('Het gerecht is verwijderd.'));
        } else {
            $this->Flash->error(__('Het gerecht kon niet worden verwijderd, probeer het opnieuw.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
