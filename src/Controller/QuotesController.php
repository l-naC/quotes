<?php
//src/Controller/QuotesController.php

//A quel espace de logique au quel il appartient. Donc juste son espace logique
namespace App\Controller;

class QuotesController extends AppController
{
    public function hello()
    {

    }

    public function index()
    {
        //Sur l'appli trouve toutes les quotes
        //trouve tout le contenu de la table quotes (de la base) et le stocke dans la variable $quote
        $quotes = $this->Quotes->find();
        // se qu'il a recup dans la variable $quotes, il va le transmettre dans la vue
        //transmet la variable  $quotes à la vue
        $this->set(compact('quotes'));
    }

    public function view($id)
    {
        //recupere l'element qui a l'id chercher
        $one = $this->Quotes->get($id);
        //Transmet la variable $one  à la vue en changeant le nom par citation
        $this->set('citation', $one);
    }

    public function add()
    {
        //On créer une nouvelle identité vide. Objet de type Quotes qui est vide
        $new = $this->Quotes->newEntity();
        // si on arrive sur cette action en methode POST
        if ($this->request->is('post')) {
            // on met les données de l'utilisateur dans l'objet $new
            $new = $this->Quotes->patchEntity($new, $this->request->getData());
            //si la sauvegard fonctionne, on confirme et on redirige vers la liste globale des citations
            if ($this->Quotes->save($new)) {
                $this->Flash->success('Ok');

                return $this->redirect(['action' => 'index']);
            }
            //si ca a planté on queule sur l'internaute
            $this->Flash->error('Planté');
        }
        //Envoie la variable dans la vue
        $this->set(compact('new'));
    }

    public function edit($id)
    {
        //On recupere les donnée de la citation
        $citation = $this->Quotes->get($id);

        if ($this->request->is(['post', 'put'])) {
            // si on passe le patchEntity sans le mettre dans une variable, seul les champs modifié seront envoyés dans la requete
            $this->Quotes->patchEntity($citation, $this->request->getData());
            //si la sauvegard fonctionne, on confirme et on redirige vers la liste globale des citations
            if ($this->Quotes->save($citation)) {
                $this->Flash->success('Modif ok');
                //return vers la page de cette citation
                return $this->redirect(['action' => 'view', $citation->id]);
            }
            //si ca a planté on queule sur l'internaute
            $this->Flash->error('Modif planté');
        }
        $this->set(compact('citation'));
    }

    public function delete($id)
    {
        //securrise car bloque si methode get
        $this->request->allowMethod(['post', 'delete']);
        //On recupere les donnée de la citation
        $quote = $this->Quotes->get($id);

        if ($this->Quotes->delete($quote)) {
            $this->Flash->success('Supprimé');
            //return vers la page de cette citation
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error('Supprimession planté');
            //return vers la page de cette citation
            return $this->redirect(['action' => 'view', $id]);
        }
    }
}
