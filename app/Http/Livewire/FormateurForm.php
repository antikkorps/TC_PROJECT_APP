<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class FormateurForm extends Component
{
    use WithPagination;

    public $prenom;
    public $nom;
    public $email;
    public $habilitation;

    protected $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required',
        'habilitation' => 'required',
    ];

    public function storePost()
    {
        $this->validate();
        $formateur = Formateur::create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'email' => $this->email,
            'habilitation' => $this->habilitation
        ]);
        $this->reset();
    }

    public function edit($id)
    {
        $formateur = Formateur::find($id);
        $this->id = $formateur->id;
        $this->prenom = $formateur->prenom;
        $this->nom = $formateur->nom;
        $this->email = $formateur->email;
        $this->habilitation = $formateur->habilitation;
    }

    public function update()
    {
        $formateur = formateur::updateOrCreate(
            [
                'id'   => $this->formateur_id,
            ],
            [
                'prenom' => $this->prenom,
                'nom' => $this->nom,
                'email' => $this->email,
                'habilitation' => $this->habilitation
            ],

        );

        $this->reset();
    }

    public function destroy($id)
    {
        Formateur::destroy($id);
    }


    public function render()
    {
        return view('livewire.formateur-form', ['formateurs' => Formateur::latest()->paginate(10)]);
    }
}