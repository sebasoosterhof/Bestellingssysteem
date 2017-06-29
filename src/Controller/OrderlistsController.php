<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orderlists Controller
 *
 * @property \App\Model\Table\OrderlistsTable $Orderlists
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
        $this->loadModel('Reservations');
        $this->loadModel('Subcategories');

        $this->paginate = [
            'contain' => ['Dishes']
        ];

        $orderlists = $this->paginate($this->Orderlists);

        $subcategories = $this->Subcategories->find('all');

        $reservations = $this->Reservations->find('all');

        $lunchDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '1']);
        $dinerDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '2']);
        $dessertDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '3']);

        $this->set(compact('orderlists', 'lunchDishes', 'dinerDishes', 'dessertDishes', 'reservations', 'subcategories'));
        $this->set('_serialize', ['orderlists']);

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
        $this->loadModel('Reservations');

        $reservations = $this->Reservations->find()->extract('lastname');

        $orderlist = $this->Orderlists->newEntity();
        if ($this->request->is('post')) {
            $orderlist = $this->Orderlists->patchEntity($orderlist, $this->request->getData());
            if ($this->Orderlists->save($orderlist)) {
                $this->Flash->success(__('De order is opgeslagen en toegevoegd.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__(' kon niet opgeslagen of toegevoegd worden, probeer het opnieuw.'));
        }
        $dishes = $this->Orderlists->Dishes->find('list', ['limit' => 200]);
        $this->set(compact('orderlist', 'dishes', 'reservations'));
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
                $this->Flash->success(__('De bestellijst is opgeslagen en bijgewerkt.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('De bestellijst kon niet opgeslagen of bijgewerkt worden, probeer het opnieuw.'));
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
            $this->Flash->success(__('De bestellijst is verwijderd.'));
        } else {
            $this->Flash->error(__('De bestellijst kon niet verwijderd worden, probeer het opnieuw.'));
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

        $count = count($this->request->session()->read('sessionOrders'));
        $this->request->session()->write('sessionOrders.'.$count, $this->Orderlists->Dishes->get($id, array('subcategory','title','price')));

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

     /**
     * setOrderlist method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function setOrderlist() {
        $this->loadModel('Reservations');

        $sessionOrders = $this->request->session()->read('sessionOrders');
        $reservations = $this->Reservations->find('all');

        foreach ($reservations as $key => $value) {
            $reservationId = $value['id'];
        }

        foreach ($sessionOrders as $key => $value) {
            $orderlist = $this->Orderlists->newEntity();
            $dishes_id = $value['id'];

            $this->request->data['orderlists']['dishes_id'] = $dishes_id;
            $this->request->data['orderlists']['reservations_id'] = $reservationId;


            $orderlist = $this->Orderlists->patchEntity($orderlist, $this->request->data['orderlists']);
            if ($this->request->is('post')) {
                if (!$this->Orderlists->save($orderlist)) {
                    $this->Flash->error(__('De reservering kon niet verzonden worden, probeer het opnieuw.'));
                }
            }
        }
        if ($this->Orderlists->save($orderlist)) {
            $this->Flash->success(__('De reservering is verzonden.'));
        }
        return $this->redirect(['action' => 'index']);
    }

     /**
     * overview method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function overview() {
        $this->loadModel('Dishes');
        $this->loadModel('Subcategories');

        $this->paginate = [
            'contain' => ['Dishes']
        ];

        $subcategories = $this->Subcategories->find('all');
        $lunchDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '1']);
        $dinerDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '2']);
        $dessertDishes = $this->Orderlists->Dishes->find('all')->where(['categories_id' => '3']);

        $this->set(compact('lunchDishes', 'dinerDishes', 'dessertDishes', 'subcategories'));
        $this->set('_serialize', ['orderlists']);
    }

     /**
     * orders method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     *
     */
    public function orders() {
        // $this->loadModel('Orderlists');
        // $this->loadModel('Reservations');


        // $orderlists = $this->paginate($this->Orderlists);

        // $reservations = $this->Reservations->find('all');



        // $this->set(compact('orderlists', 'reservations'));
        // $this->set('_serialize', ['orderlists']);

        $this->paginate = [
            'contain' => ['Reservations', 'Dishes']
        ];
        $orderlists = $this->paginate($this->Orderlists);
        $this->set(compact('orderlists'));
        $this->set('_serialize', ['orderlists']);

    }


















}
