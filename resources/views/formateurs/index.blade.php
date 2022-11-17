@include('dashboard')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des formateurs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Adresse</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formateurs as $formateur)
                                    <tr>
                                        <td>{{ $formateur->id }}</td>
                                        <td>{{ $formateur->nom }}</td>
                                        <td>{{ $formateur->prenom }}</td>
                                        <td>{{ $formateur->adresse }}</td>
                                        <td>{{ $formateur->telephone }}</td>
                                        <td>{{ $formateur->email }}</td>
                                        <td>
                                            <a href="{{ route('formateurs.edit', $formateur->id) }}"
                                                class="btn btn-primary">Modifier</a>
                                            <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Adresse</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>