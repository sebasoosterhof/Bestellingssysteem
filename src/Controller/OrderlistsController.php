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
class OrderlistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dishes']
        ];
        $orderlists = $this->paginate($this->Orderlists);

        $this->set(compact('orderlists'));
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
    public function delete($id = null)
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
}
