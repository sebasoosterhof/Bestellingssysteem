<?php
// =================================================================
// @Author: Sebastian Oosterhof
// @Description: handles DishesController index, view, add, edit and delete functions.
// @Version: 1.0
// @Date: 26-06-2017
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

        $this->set(compact('dishes'));
        $this->set('_serialize', ['dishes']);

        $lunchDishes = $this->Dishes->find('all')->where(['category' => 'Lunch']);
        $dinerDishes = $this->Dishes->find('all')->where(['category' => 'Diner']);
        $dessertDishes = $this->Dishes->find('all')->where(['category' => 'Dessert']);

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
        $dish = $this->Dishes->newEntity();
        if ($this->request->is('post')) {
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Het gerecht is opgeslagen.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Het gerecht kon niet worden opgeslagen, probeer het opnieuw.'));
        }
        $this->set(compact('dish'));
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
        $this->set(compact('dish'));
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
