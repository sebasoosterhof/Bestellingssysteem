<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Orderlists Controller
 *
 * @property \App\Model\Table\OrderlistsTable $Orderlists
 *
 * @property \App\Model\Table\DishesTable $Dishes
 *
 * @method \App\Model\Entity\Orderlist[] paginate($object = null, array $settings = [])
 */
session_start();
class OrderlistsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->session()->read('orders')) {
            $this->orders = $this->request->session()->write('orders', $this->orders);
            $this->orders = $this->request->session()->read('orders');
        }

        $this->loadModel('Dishes');

        $this->paginate = [
            'contain' => ['Dishes']
        ];

        $orderlists = $this->paginate($this->Orderlists);


        $this->set(compact('orderlists'));
        $this->set('_serialize', ['orderlists']);

        $lunchDishes = $this->Dishes->find('all')->where(['category' => 'Lunch']);
        $dinerDishes = $this->Dishes->find('all')->where(['category' => 'Diner']);
        $dessertDishes = $this->Dishes->find('all')->where(['category' => 'Dessert']);

        $this->set('lunchDishes', $lunchDishes);
        $this->set('dinerDishes', $dinerDishes);
        $this->set('dessertDishes', $dessertDishes);

        $this->set('orders', $this->orders);
    }

    /**
     * View method
     *
     * @param string|null $id Orderlist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderlist = $this->Orderlists->get($id, [
            'contain' => ['Dishes']
        ]);

        $this->set('orderlist', $orderlist);
        $this->set('_serialize', ['orderlist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderlist = $this->Orderlists->newEntity();
        if ($this->request->is('post')) {
            $orderlist = $this->Orderlists->patchEntity($orderlist, $this->request->getData());
            if ($this->Orderlists->save($orderlist)) {
                $this->Flash->success(__('The orderlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderlist could not be saved. Please, try again.'));
        }
        $dishes = $this->Orderlists->Dishes->find('list', ['limit' => 200]);
        $this->set(compact('orderlist', 'dishes'));
        $this->set('_serialize', ['orderlist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orderlist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderlist = $this->Orderlists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderlist = $this->Orderlists->patchEntity($orderlist, $this->request->getData());
            if ($this->Orderlists->save($orderlist)) {
                $this->Flash->success(__('The orderlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderlist could not be saved. Please, try again.'));
        }
        $dishes = $this->Orderlists->Dishes->find('list', ['limit' => 200]);
        $this->set(compact('orderlist', 'dishes'));
        $this->set('_serialize', ['orderlist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Orderlist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderlist = $this->Orderlists->get($id);
        if ($this->Orderlists->delete($orderlist)) {
            $this->Flash->success(__('The orderlist has been deleted.'));
        } else {
            $this->Flash->error(__('The orderlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * addDishToOrder method
     *
     * @param $id
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function addDishToOrder($id) {
        $dish = $this->Orderlists->Dishes->get($id);

        $count = count($this->request->session()->read('sessionOrders')); // counts the number of dishes in sessionOrders.
        $this->request->session()->write('sessionOrders.'.$count, $this->Orderlists->Dishes->get($id, array('subcategory','title','price'))); // adds the dish after the previous dish if there is one.

        // var_dump($this->request->session()->read('sessionOrders'));
        // die;
        return $this->redirect(['action' => 'index']);
    }

     /**
     * removeDishFromOrder method
     *
     * @param $id
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function removeDishFromOrder($id) {
        // error_reporting(0);
        $dish = $this->Orderlists->Dishes->get($id);

        $tempOrder = $this->request->session()->read('sessionOrders');
        if(count($tempOrder) === 1) {
            $this->request->session()->delete('sessionOrders');
        }
        else if(!empty($tempOrder)) {
            for ($i=0; $i<count($tempOrder); $i++) {
                    if($tempOrder[$i]['id'] == $id) {
                        unset($tempOrder[$i]);
                        $tempOrder = array_values($tempOrder);
                    }
                $this->request->session()->write('sessionOrders', $tempOrder);
            }
        }

        // if(empty($this->request->session()->check('sessionOrders'))) {
        //     $this->request->session()->delete('sessionOrders');

        //     return $this->redirect(['action' => 'index']);
        // }

        return $this->redirect(['action' => 'index']);
    }

     /**
     * deleteOrders method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function deleteOrders() {
        $this->request->session()->delete('sessionOrders');

        return $this->redirect(['action' => 'index']);
    }
}
